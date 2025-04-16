<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Quality\QualityCampaign;


use App\Models\Quality\QualityQuestion;
use App\Models\Quality\QualityQuestionCategory;
use App\Models\Quality\QualityAnswer;
use App\Models\Quality\QualityQuestionnaire;

use App\Models\User\UserQuestionnaire;
use App\Models\User\UserQuestionnaireAnswer;


class UserQuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

     public function show_intro($id)
     {
        $user_questionnaire = UserQuestionnaire::find($id);
        //return ($user_questionnaire);
        return view('users.questionnaires.intro')
            ->with('user_questionnaire', $user_questionnaire);
     }
     
     public function intro_questionnaire($id) 
     {
        $user_questionnaire = UserQuestionnaire::find($id);
           // Poiščite prvi ustrezen campaign_questionnaire
        $introCampaignQuestionnaire = $user_questionnaire->campaign->campaign_questionnaires
            ->where('quality_campaign_questionnaire_type', 'intro')
            ->first();

            // Preverite, ali obstaja introCampaignQuestionnaire in nato poiščite vprašalnike
        if ($introCampaignQuestionnaire) {
            $quality_intro_questionnaire = $introCampaignQuestionnaire->questionnaire;
        } else {
            // Ravnanje, ko introCampaignQuestionnaire ne obstaja (neobvezno)
            $quality_intro_questionnaire = null;
        }                         
        //poiskati moram classes
        $quality_target_groups = $user_questionnaire->campaign->targetgroups;
        $quality_campaign_classes = $quality_target_groups->flatMap(function ($targetgroup) {
            return $targetgroup->classes;
        })->sortBy('class_year');

        //return ($quality_campaign_classes);
        
        //return($quality_intro_questionnaire);
        return view('users.questionnaires.intro_questionnaire')
            ->with('user_questionnaire', $user_questionnaire)
            ->with('quality_campaign_classes', $quality_campaign_classes)
            ->with('quality_intro_questionnaire', $quality_intro_questionnaire);
     }
     public function start_questionnaire(Request $request, $id)
     {
        //return($request);
        $user_questionnaire_answer = new UserQuestionnaireAnswer;
        $user_questionnaire_answer->user_questionnaire_id = $id;
        $user_questionnaire_answer->quality_target_group_class_id = $request->input('quality_target_group_class_id');
        $user_questionnaire_answer->user_gender = $request->input('user_gender');
        
        $user_questionnaire_answer->save();

        $user_questionnaire = UserQuestionnaire::find($id);
 
         if (!$user_questionnaire) {
             return redirect('/home')->with('error', 'Vprašalnik ne obstaja');
         }
         $quality_questionnaires = $user_questionnaire->campaign->campaign_questionnaires->where('quality_campaign_questionnaire_type', 'main');
         
         //popravi!!! niso vse polne
         $quality_categories = collect();
         //$questions = collect();
        // Iterirajte skozi vse vprašalnike in njihove vprašanja
        foreach ($quality_questionnaires as $quality_questionnaire) {
            foreach ($quality_questionnaire->questionnaire->questions as $quality_question) {
                // Dodajte kategorijo vprašanja v kolekcijo, če še ni dodana
                foreach ($quality_question->subquestions as $quality_subquestion) {
                    if ($quality_subquestion->quality_person_role_id == $user_questionnaire->quality_person_role_id) {
                        if ($quality_question->category) {
                            $quality_categories->push($quality_question->category);
                        }
                    }
                }
                //$questions->push($quality_question);
            }
        }


        //return( $quality_categories);
        // Odstranite podvojene kategorije
        $quality_category_ids = $quality_categories->unique('id')->pluck('id')->values()->toArray();

         Session::put('current_step', 1);
         Session::put('user_questionnaire_id', $id);
         Session::put('user_questionnaire_answer_id', $user_questionnaire_answer->id);
         Session::put('quality_category_ids', $quality_category_ids);
 
         return redirect()->route('user_questionnaire_step', ['step' => 1]);
     }
 
     public function show_step($step)
     {
         $user_questionnaire_id = Session::get('user_questionnaire_id');
         $quality_category_ids = Session::get('quality_category_ids');
         //return( $quality_category_ids);
         
        // return ($quality_categories);
         // Pridobitev kategorij
          
         if ($step > count($quality_category_ids)) {
             return redirect()->route('user_questionnaire_show_nps');
         }
         //return ( $quality_categories);
         //return ($step);
         if (!is_array($quality_category_ids) || !isset($quality_category_ids[$step - 1])) {
            return redirect()->route('user_questionnaire_show_nps');
        }
        $category_id = $quality_category_ids[$step - 1];
        $quality_category = QualityQuestionCategory::find($category_id);

         $user_questionnaire = UserQuestionnaire::find($user_questionnaire_id);

         $quality_questionnaires = $user_questionnaire->campaign->campaign_questionnaires->where('quality_campaign_questionnaire_type', 'main');

         $quality_questions = collect();

        // Iterirajte skozi vse vprašalnike in njihove vprašanja
        foreach ($quality_questionnaires as $quality_questionnaire) {
            foreach ($quality_questionnaire->questionnaire->questions as $quality_question) {
                // Dodajte kategorijo vprašanja v kolekcijo, če še ni dodana
                if ($quality_question->category->id == $quality_category->id) {
                    foreach ($quality_question->subquestions as $quality_subquestion) {
                        if ($quality_subquestion->quality_person_role_id ==  $user_questionnaire->quality_person_role_id)
                            $quality_questions->push($quality_subquestion);

                    }
                }
            }
        }
        //return ($quality_questions);
        return view('users.questionnaires.step')
            ->with('step', $step)
            ->with('quality_questions', $quality_questions)
            ->with('quality_category', $quality_category)
            ->with('user_questionnaire', $user_questionnaire);
            
         return view('users.questionnaires.step', compact('step', 'user_questionnaire', 'questions', 'category'));
     }
 
     public function store_step(Request $request, $step)
     {
        $user_questionnaire_id = Session::get('user_questionnaire_id');
        $user_questionnaire = UserQuestionnaire::find($user_questionnaire_id);
        $user_questionnaire_answer_id = Session::get('user_questionnaire_answer_id');
        //return ($user_questionnaire_id);
         
         if (!$user_questionnaire) {
             return redirect('/home')->with('error', 'Vprašalnik ne obstaja');
         }
 
         $rules = [];
         foreach ($request->all() as $key => $value) {
             if (strpos($key, 'question') === 0) {
                 $rules[$key] = 'required';
             }
         }
 
         $validator = Validator::make($request->all(), $rules);
 
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
        //return ($request);
         foreach ($request->all() as $key => $value) {
             if (strpos($key, 'question') === 0) {
                 $questionId = substr($key, strlen('question'));
                 $quality_question = QualityQuestion::find($questionId);
                //return ($quality_question);
                 $qualityAnswer = new QualityAnswer;
                 $qualityAnswer->quality_campaign_id = $user_questionnaire->quality_campaign_id;
                 $qualityAnswer->user_questionnaire_answer_id = $user_questionnaire_answer_id;
                 $qualityAnswer->quality_question_id = $questionId;
                 $qualityAnswer->quality_person_role_id = $user_questionnaire->quality_person_role_id;
                 $qualityAnswer->quality_question_parent_id = $quality_question->quality_question_parent_id;
                 $qualityAnswer->quality_answer_value = $value;
 
                 $qualityAnswer->save();
             }
         }
 
         $next_step = $step + 1;
 
         return redirect()->route('user_questionnaire_step', ['step' => $next_step]);
     }
     public function show_nps()
     {
        $user_questionnaire_id = Session::get('user_questionnaire_id');
        
        $user_questionnaire = UserQuestionnaire::find($user_questionnaire_id);
        //return ($user_questionnaire);
        $quality_questionnaire_nps = QualityQuestionnaire::where('quality_questionnaire_name','NPS (Net Promoter Score)')
            ->first();
        //return ($quality_questionnaire_nps);
        //return ($quality_questionnaire_nps->questions);
        $quality_questions = collect();
        foreach ($quality_questionnaire_nps->questions as $quality_question) {
            
            foreach ($quality_question->subquestions as $quality_subquestion) {
                //return ($quality_subquestion);
                if ($quality_subquestion->quality_person_role_id ==  $user_questionnaire->quality_person_role_id)
                    $quality_questions->push($quality_subquestion);
            }
        }
        //return ($quality_questions);
        return view('users.questionnaires.nps')
            ->with('quality_questions', $quality_questions)
            ->with('quality_questionnaire_nps', $quality_questionnaire_nps)
            ->with('user_questionnaire', $user_questionnaire);
     }

     public function store_nps(Request $request, $step)
     {
        $user_questionnaire_id = Session::get('user_questionnaire_id');
        $user_questionnaire = UserQuestionnaire::find($user_questionnaire_id);
        $user_questionnaire_answer_id = Session::get('user_questionnaire_answer_id');
        //return ($user_questionnaire_id);
         
         if (!$user_questionnaire) {
             return redirect('/home')->with('error', 'Vprašalnik ne obstaja');
         }
 
         $rules = [];
         foreach ($request->all() as $key => $value) {
             if (strpos($key, 'question') === 0) {
                 $rules[$key] = 'required';
             }
         }
 
         $validator = Validator::make($request->all(), $rules);
 
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
        //return ($request);
         foreach ($request->all() as $key => $value) {
             if (strpos($key, 'question') === 0) {
                 $questionId = substr($key, strlen('question'));
                 $quality_question = QualityQuestion::find($questionId);
                //return ($quality_question);
                 $qualityAnswer = new QualityAnswer;
                 $qualityAnswer->quality_campaign_id = $user_questionnaire->quality_campaign_id;
                 $qualityAnswer->user_questionnaire_answer_id = $user_questionnaire_answer_id;
                 $qualityAnswer->quality_person_role_id = $user_questionnaire->quality_person_role_id;

                 $qualityAnswer->quality_question_id = $questionId;
                 $qualityAnswer->quality_question_parent_id = $quality_question->quality_question_parent_id;
                 $qualityAnswer->quality_answer_value = $value;
 
                 $qualityAnswer->save();
             }
         }
 
         $next_step = $step + 1;
 
         return redirect()->route('user_questionnaire_thankyou');
     }

     
     public function show_thankyou()
     {
         return view('users.questionnaires.thankyou');
     }
 
     private function getCategories()
     {
         // Pridobitev kategorij, lahko prilagodite, če je potrebno
         return QualityQuestionCategory::all();
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        //


    }

    public function user_questionnaire_create(Request $request)
    {
        //
        $request->validate([
            'user_questionnaires_code' => 'required|regex:/^[0-9A-Za-z]{4}\.[0-9A-Za-z]{4}$/i'
        ], [
            'user_questionnaires_code.regex' => 'Koda vprašalnika mora biti v obliki XXXX.XXXX.'
        ]);
        $user_questionnaires_code = $request->input('user_questionnaires_code');
        // Razdelitev vrednosti na dva dela glede na piko
        list($user_questionnaires_code_school, $user_questionnaires_code_number) = explode('.', $user_questionnaires_code);
        //return ($user_questionnaires_code_school);
        $user_questionnaire = UserQuestionnaire::where('user_questionnaires_code_school', $user_questionnaires_code_school)
            ->where('user_questionnaires_code_number', $user_questionnaires_code_number)
            ->first();
        //return ($user_questionnaire); users/questionnaires/{id}/intro
        if ($user_questionnaire) {
            return redirect('/users/questionnaires/'.$user_questionnaire->id . '/intro');
            //return redirect('/users/questionnaires/'.$user_questionnaire->id);
        } else {
            // Zapis ne obstaja, nadaljujte s postopkom
            return redirect()->back()->with('error', 'Vprašalnik ne obstaja');
        }
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function user_questionnaire_store(Request $request)
    {
        // Preverjanje obveznih polj
        $rules = [];

    // Za vsako vprašanje sestavimo pravilo preverjanja
    foreach ($request->all() as $key => $value) {
        if (strpos($key, 'question') === 0) {
            $rules[$key] = 'required';
        }
    }

    // Ustvarimo validator
    $validator = Validator::make($request->all(), $rules);

    // Preverimo, ali so pravila upoštevana
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    
        // Zanka za iteriranje prejetih vprašanj in odgovorov
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'question') === 0) {
                // Iz ključa dobimo ID vprašanja
                $questionId = substr($key, strlen('question'));
                $quality_question = QualityQuestion::find($questionId);
                //return($quality_question);
                // Ustvarimo nov zapis v modelu QualityAnswer
                $qualityAnswer = new QualityAnswer;
                $qualityAnswer->quality_campaign_id = $request->quality_campaign_id;
                //$quality_question->quality_target_group_id ni določena, ker je vprašalnik sestavljen iz vseh vprašanj za vse ciljne skupine.
                $qualityAnswer->quality_target_group_id = $quality_question->quality_target_group_id;
                $qualityAnswer->quality_person_role_id = $user_questionnaire->quality_person_role_id;


                $qualityAnswer->quality_question_id = $questionId;
                $qualityAnswer->quality_question_parent_id = $quality_question->quality_question_parent_id;
                $qualityAnswer->quality_answer_value = $value; // Odgovor iz vprašalnika
    
                // Shranimo zapis v bazo
                $qualityAnswer->save();
                //return (12);

            }
        }
        //return (1); 
        return redirect()->route('home')->with('success', 'Vprašalnik je bil uspešno shranjen.');
        foreach ($validatedData as $questionId => $answerValue) {
            // Ustvarjanje in shranjevanje novega zapisa v model QualityAnswer
            $quality_question = QualityQuestion::find($questionId);
            return($quality_question);
            $qualityAnswer = new QualityAnswer();
            
            $qualityAnswer->quality_campaign_id = $request->input ('quality_campaign_id');
            $qualityAnswer->quality_target_group_id = $request->input ('quality_target_group_id');
            $qualityAnswer->quality_person_role_id = $user_questionnaire->quality_person_role_id;

            $qualityAnswer->quality_question_id = $questionId;
            $qualityAnswer->quality_answer_value = $answerValue;
            $qualityAnswer->save();
        }

        // Uspešno sporočilo ali preusmeritev nazaj na začetno stran
        return redirect()->route('home')->with('success', 'Vprašalnik je bil uspešno shranjen.');
    }
    public function store(Request $request)
    {
        //
        if (!auth()->check()) {
            return redirect('/')
                ->with('error', 'Niste prijavljeni.'); 
        }
        request()->validate([
            'quality_campaign_id' => 'required', 
        ],
        [
            'quality_campaign_id.required' => 'Potrebno je izbrati kampanjo.',
        ]);

        $quality_campaign = QualityCampaign::find($request->input ('quality_campaign_id'));

        $user_questionnaire_person_roles = collect();
        foreach ($quality_campaign->targetgroups as $quality_campaign_target_group) {
            foreach ($quality_campaign_target_group->personroles as $quality_campaign_target_group_person_role) {
                $user_questionnaire_person_roles->push($quality_campaign_target_group_person_role); // Dodamo vse osebne vloge v zbirko
            }
        }
        $user_questionnaire_person_roles = $user_questionnaire_person_roles->unique('id');
        //return ($user_questionnaire_person_roles);

        foreach ($user_questionnaire_person_roles as $user_questionnaire_person_role) {
            foreach ($quality_campaign->questionnaires as $quality_campaign_questionnaire) {
                $user_questionnaire_questions = collect();
                foreach ($quality_campaign_questionnaire->questions as $quality_campaign_questionnaire_question) {
                    $user_question = QualityQuestion::where('quality_question_parent_id',$quality_campaign_questionnaire_question->id)
                        ->where('quality_person_role_id',$user_questionnaire_person_role->id)
                        ->first();
                    $user_questionnaire_questions->push($user_question); // Dodamo vse osebne vloge v zbirko
                }
            }
        }
        return ($user_questionnaire_questions);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $user_questionnaire = UserQuestionnaire::find ($id);
        $quality_campaign = $user_questionnaire->campaign;
        
        $quality_campaign_questions = collect();
        foreach ($quality_campaign->questionnaires as $quality_campaign_questionnaire) {
            $quality_campaign_questions = $quality_campaign_questions->merge($quality_campaign_questionnaire->questions);
        }
        $quality_campaign_questions = $quality_campaign_questions->unique ('id');

        $quality_campaign_subquestions = collect();
        foreach ($quality_campaign_questions as $quality_campaign_question) {
            $subquestions = $quality_campaign_question->subquestions()->where('quality_person_role_id', $user_questionnaire->quality_person_role_id)->get();
            $quality_campaign_subquestions = $quality_campaign_subquestions->merge($subquestions);
        }
        
        $quality_campaign_questions = $quality_campaign_subquestions->unique('id');


        //return ($quality_campaign_subquestions);
        return view('users.questionnaires.show')
            ->with('user_questionnaire', $user_questionnaire)
            ->with('quality_campaign_questions', $quality_campaign_questions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
