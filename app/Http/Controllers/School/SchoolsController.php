<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

use App\Models\App\AppPosition;
use App\Models\App\AppUserActiveStatus;
use App\Models\App\AppAreaPerson;
use App\Models\App\AppPositionPerson;


use App\Models\Calendars\CalendarEvent;
use App\Models\Calendars\CalendarEventType;
use App\Models\Calendars\CalendarEventOwnership;



use App\Models\School\SchoolOrganization;
use App\Models\School\SchoolOrganizationPerson;
use App\Models\School\SchoolOrganizationYearPerson;




use App\Models\Quality\QualityCampaign;
use App\Models\Posts\Post;
use App\Models\Posts\PostCategory;

use App\Models\Quality\QualityQuestion;
use App\Models\Quality\QualityPersonRole;
use App\Models\Quality\QualityAnswer;


use App\Models\App\AppDay;
use App\Models\App\AppEmail;
use App\Models\App\AppEmailSchedule;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    { 
        $this->middleware('auth');
        $this->middleware('check.user.area:school'); // Tukaj specificiraš kodo področja
    }
    public function index() 
    {
        //
        return redirect('/school/home');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Samo testiranje, ker ne prikazuje konferenc.

        //return(1);
        $user = Auth::user();
        //return($user->people);
        $user_active_status = $user->active_status;
        if (!$user_active_status) {
            $user_active_status = new AppUserActiveStatus;
            $user_active_status->user_id = $user->id;
            //potrebno je poiskati profil s šolo.

            $person = $user->people->firstWhere('school_organization_id', '!=', null);
            if (!$person) {
                $user_active_status->person_id = $user->user_person_id;
            } else {
                $user_active_status->person_id = $person->id;
            }
            $app_position = AppPositionPerson::where('person_id',$user->user_person_id)
                ->first();
            if (!$user_active_status) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Oseba nima delovnega mesta'); 
            }
            $user_active_status->app_position_id = $app_position->id;
            $app_aprea = AppAreaPerson::where('person_id',$user->user_person_id)
                ->first();
            if (!$app_aprea) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Oseba nima področja'); 
            }
            $user_active_status->app_area_id = $app_aprea->id;
            $user_active_status->save();
        }
        //return ($user_active_status);
        $person = $user_active_status->person;
        //return ($person);
        $school_organization_year_current = $person->school_organization_year_current; 
        //return ($school_organization_year_current);
        if (!$school_organization_year_current) {

            $people = $user->people;
            $school_organization_year_person = SchoolOrganizationYearPerson::whereIn('person_id', $people->pluck('id'))
                ->first();
            //return ($school_organization_year_person);
            if (!$school_organization_year_person) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Nimate nobenega šolskega leta'); 
            }
            $person->school_organization_year_id_current = $school_organization_year_person->school_organization_year_id;
            $person->save();
        }
        //return ($person);

        //return ($person);
        $person_school_organization = $person->school;
        //return ($person_school_organization);

        if (!$person_school_organization) {
            //return($person_school_organization);
            $school_organization_year_person = SchoolOrganizationYearPerson::where('person_id',$person->id)
                ->first();
            //return($school_organization_year_person);
            if (!$school_organization_year_person) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Nimate določene šole'); 
            }

            $person->school_organization_id = $school_organization_year_person->school_organization_year->organization->id;
            $person->school_organization_year_id_current = $school_organization_year_person->school_organization_year_id;
            //return($person);
            $person->save();

        }
        //return($person_school_organization);

        $school_organization = $user->active_organization->school;
        //return($school_organization);
        if (!$school_organization) {
            return redirect('/users/'. $user->id)
                ->with('error', 'Organizacija nima šole'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        }
        $school_areas = $school_organization->school_areas;
        //return ($user->active_organization);

        // Nastavite trenutni datum
        $today = Carbon::today();

        // Pridobite dogodke po danih pogojih
        $school_events = CalendarEvent::where(function ($query) use ($person, $today) {
                $query->where(function ($q) use ($today) {
                    $q->where('calendar_event_start_time', '>=', $today)
                        ->orWhere('calendar_event_end_time', '>=', $today);
                })
                ->whereHas('calendar.organization', function ($q) use ($person) {
                    $q->where('id', $person->school_organization_id);
                })
                ->whereHas('ownership', function ($q) use ($person) {
                    $q->where('calendar_event_ownership_name', 'school')
                        ->orWhere(function ($q) use ($person) {
                            $q->where('calendar_event_ownership_name', 'personal')
                                ->where('person_id', $person->id);
                        });
                });
            })
            ->orderBy('calendar_event_start_time', 'asc')
            ->get(); // Izvrši poizvedbo in vrne zbirko rezultatov
        //return ($school_events);
        // Pridobite "conference" tip dogodka
        $calendar_event_type_conference = CalendarEventType::where('calendar_event_type_name', 'conference')->first();
        //return ($calendar_event_type_conference);
        // Če obstaja tip dogodka "conference"
        //$school_event->calendar_event_type_id == $calendar_event_type_conference->id
        $school_conferences = CalendarEvent::where(function ($query) use ($person, $today, $calendar_event_type_conference) {
            $query->where(function ($q) use ($today) {
                $q->where('calendar_event_start_time', '>=', $today)
                  ->orWhere('calendar_event_end_time', '>=', $today);
            })
            ->whereHas('calendar.organization', function ($q) use ($person) {
                $q->where('id', $person->school_organization_id);
            })
            ->whereHas('ownership', function ($q) use ($person) {
                $q->where('calendar_event_ownership_name', 'school')
                  ->orWhere(function ($q) use ($person) {
                      $q->where('calendar_event_ownership_name', 'personal')
                        ->where('person_id', $person->id);
                  });
            })
            // Dodajte ta pogoj, da filtrirate dogodke po vrsti
            ->where('calendar_event_type_id', $calendar_event_type_conference->id);
        })
        ->orderBy('calendar_event_start_time', 'asc')
        ->get();

/*
        if ($calendar_event_type_conference) {
            // Filtrirajte dogodke pred grupiranjem
            $school_conferences = $school_events->filter(function ($event) use ($calendar_event_type_conference) {
                return $event->calendar_event_type_id === $calendar_event_type_conference->id;
            })->groupBy(function ($event) {
                return Carbon::parse($event->calendar_event_start_time)->format('Y-m-d');
            });
        } else {
            $school_conferences = collect();
        }
*/
        // Skupina preostalih dogodkov po datumu
        $school_events = $school_events->groupBy(function ($event) {
            return Carbon::parse($event->calendar_event_start_time)->format('Y-m-d');
        });
        //return ($school_conferences);
        //return ($calendar_event_type_conference);    
        //return ($school_conferences);







        //return ($school_events);
        $quality_campaigns = QualityCampaign::orderBy('created_at', 'desc')->limit(5)->get();
        

        $posts = Post::All();
        //return ($school_organization);
        return view('school.home')
            ->with('school_conferences', $school_conferences)
            ->with('quality_campaigns', $quality_campaigns)
            ->with('school_events', $school_events)
            ->with('posts', $posts)
            ->with('school_areas', $school_areas)
            ->with('school_organization', $school_organization);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = Auth::user();
        //return($id);
        // Preverjanje, ali ima uporabnik aktivni status
        if (!$user->active_status) {
            return redirect('home')->with('error', 'Nimate aktivnega statusa.');
        }

        // Preverjanje, ali ima aktivni status osebo povezano
        $person = $user->active_status->person;
        if (!$person) {
            return redirect('home')->with('error', 'Nimate povezane osebe.');
        }

        // Preverjanje, ali obstaja šola z danim ID-jem
        $school_organization = SchoolOrganization::find($id);
        if (!$school_organization) {
            return redirect('home')->with('error', 'Šola ni najdena.');
        }

        // Preverjanje, ali je šola osebe enaka zahtevani šoli
        if ($person->school->id != $school_organization->id) {
            return redirect('home')->with('error', 'Nimate dovoljenja.');
        }
        $school_year = $person->school_organization_year_current;
        //return ($school_year);
        $school_organization_people = $school_year->people;
        $app_positions = AppPosition::all(); 
        $school_organization_people = SchoolOrganizationPerson::where('school_organization_id', $school_organization->id)
        ->where('school_organization_year_id', $school_year->id)
        ->get();

        
        return view('school.show')
        ->with('app_positions', $app_positions)
        ->with('school_organization_people', $school_organization_people)
        ->with('school_year', $school_year)
        ->with('school_organization', $school_organization);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
    public function home()
    { 
        //
        //return (1);
        $user = Auth::user();
        
        //return($user->people);
        $user_active_status = $user->active_status;
        if (!$user_active_status) {
            $user_active_status = new AppUserActiveStatus;
            $user_active_status->user_id = $user->id;
            //potrebno je poiskati profil s šolo.

            $person = $user->people->firstWhere('school_organization_id', '!=', null);
            if (!$person) {
                $user_active_status->person_id = $user->user_person_id;
            } else {
                $user_active_status->person_id = $person->id;
            }
            $app_position = AppPositionPerson::where('person_id',$user->user_person_id)
                ->first();
            if (!$user_active_status) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Oseba nima delovnega mesta'); 
            }
            $user_active_status->app_position_id = $app_position->id;
            $app_aprea = AppAreaPerson::where('person_id',$user->user_person_id)
                ->first();
            if (!$app_aprea) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Oseba nima področja'); 
            }
            $user_active_status->app_area_id = $app_aprea->id;
            $user_active_status->save();
        }
        //return ($user_active_status);
        $person = $user_active_status->person;
        //return ($person);
        $school_organization_year_current = $person->school_organization_year_current; 
        //return ($school_organization_year_current);
        if (!$school_organization_year_current) {

            $people = $user->people;
            $school_organization_year_person = SchoolOrganizationYearPerson::whereIn('person_id', $people->pluck('id'))
                ->first();
            //return ($school_organization_year_person);
            if (!$school_organization_year_person) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Nimate nobenega šolskega leta'); 
            }
            $person->school_organization_year_id_current = $school_organization_year_person->school_organization_year_id;
            $person->save();
        }
        //return ($person);

        //return ($person);
        $person_school_organization = $person->school;
        //return ($person_school_organization);

        if (!$person_school_organization) {
            //return($person_school_organization);
            $school_organization_year_person = SchoolOrganizationYearPerson::where('person_id',$person->id)
                ->first();
            //return($school_organization_year_person);
            if (!$school_organization_year_person) {
                return redirect('/users/'. $user->id)
                    ->with('error', 'Nimate določene šole'); 
            }

            $person->school_organization_id = $school_organization_year_person->school_organization_year->organization->id;
            $person->school_organization_year_id_current = $school_organization_year_person->school_organization_year_id;
            //return($person);
            $person->save();

        }
        //return($person_school_organization);

        $school_organization = $user->active_organization->school;
        //return($school_organization);
        if (!$school_organization) {
            return redirect('/users/'. $user->id)
                ->with('error', 'Organizacija nima šole'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        }
        $school_areas = $school_organization->school_areas;
        //return ($user->active_organization);

        // Nastavite trenutni datum
        $today = Carbon::today();

        // Pridobite dogodke po danih pogojih
        $school_events = CalendarEvent::where(function ($query) use ($person, $today) {
                $query->where(function ($q) use ($today) {
                    $q->where('calendar_event_start_time', '>=', $today)
                        ->orWhere('calendar_event_end_time', '>=', $today);
                })
                ->whereHas('calendar.organization', function ($q) use ($person) {
                    $q->where('id', $person->school_organization_id);
                })
                ->whereHas('ownership', function ($q) use ($person) {
                    $q->where('calendar_event_ownership_name', 'school')
                        ->orWhere(function ($q) use ($person) {
                            $q->where('calendar_event_ownership_name', 'personal')
                                ->where('person_id', $person->id);
                        });
                });
            })
            ->orderBy('calendar_event_start_time', 'asc')
            ->get(); // Izvrši poizvedbo in vrne zbirko rezultatov

        // Pridobite "conference" tip dogodka
        $calendar_event_type_conference = CalendarEventType::where('calendar_event_type_name', 'conference')->first();

        // Če obstaja tip dogodka "conference"
        if ($calendar_event_type_conference) {
            // Filtrirajte dogodke pred grupiranjem
            $school_conferences = $school_events->filter(function ($event) use ($calendar_event_type_conference) {
                return $event->calendar_event_type_id === $calendar_event_type_conference->id;
            })->groupBy(function ($event) {
                return Carbon::parse($event->calendar_event_start_time)->format('Y-m-d');
            });
        } else {
            $school_conferences = collect();
        }

        // Skupina preostalih dogodkov po datumu 
        $school_events = $school_events->groupBy(function ($event) {
            return Carbon::parse($event->calendar_event_start_time)->format('Y-m-d');
        });

        //return ($calendar_event_type_conference);    
        //return ($school_conferences);







        //return ($school_events);
        $quality_campaigns = QualityCampaign::orderBy('created_at', 'desc')->limit(5)->get();
        

        //week calendar
        $today = Carbon::today();
        
        $startOfWeek = $today->copy()->startOfWeek(); // Začetek tedna (ponedeljek)
        //return($startOfWeek);
        $endOfWeek = $today->copy()->endOfWeek(); // Konec tedna (nedelja)
        //return($endOfWeek);

        // Iskanje dogodkov, ki se začnejo ali končajo v tekočem tednu
        $weekly_events = CalendarEvent::where(function ($query) use ($startOfWeek, $endOfWeek) {
            $query->whereBetween('calendar_event_start_time', [$startOfWeek, $endOfWeek])
                ->orWhereBetween('calendar_event_end_time', [$startOfWeek, $endOfWeek]);
        })->orderBy('calendar_event_start_time', 'asc')->get();

        //return($today);


        //Vsi šolski dogodki in osebni dogodki.
        $school_year = $person->school_organization_year_current;
        $schoolCalendarId = $person->school->calendar->id;

        //return ($weekly_events);
        $calendar_event_ownership_school = CalendarEventOwnership::where('calendar_event_ownership_name', 'School')->first();
        $calendar_event_ownership_personal = CalendarEventOwnership::where('calendar_event_ownership_name', 'Personal')->first();


        $all_events = CalendarEvent::whereNull('calendar_event_parent_id')
            ->where(function ($query) use ($schoolCalendarId, $calendar_event_ownership_school, $calendar_event_ownership_personal, $person) {
                $query->where(function ($q) use ($schoolCalendarId, $calendar_event_ownership_school) {
                    // Filtriranje šolskih dogodkov
                    $q->where('calendar_id', $schoolCalendarId)
                    ->where('calendar_event_ownership_id', $calendar_event_ownership_school->id);
                })->orWhere(function ($q) use ($calendar_event_ownership_personal, $person) {
                    // Filtriranje osebnih dogodkov, kjer je oseba lastnik
                    $q->where('calendar_event_ownership_id', $calendar_event_ownership_personal->id)
                    ->where('person_id', $person->id);
                })->orWhereIn('id', function ($subQuery) use ($person) {
                    // Filtriranje dogodkov, kjer ima oseba kakršnokoli vlogo
                    $subQuery->select('calendar_event_id')
                        ->from('calendar_event_people')
                        ->where('person_id', $person->id);
                });
            })
            ->get();

            //return ($all_events);

        $person = $user->active_status->person;
        $posts = Post::All();
        $post_categories = PostCategory::where('parent_id', null)->take(5)->get();
        //return ($school_events);


        //NPS
        $quality_person_role = QualityPersonRole::where('quality_person_role_code', 'student')
            ->first();
        //return ($quality_person_role);

        $quality_question = QualityQuestion::whereNull('quality_person_role_id')
            ->where('quality_question_name', 'LIKE', '%NPS%')
            ->first();

        $quality_question_student = $quality_question->subquestions 
            ->where('quality_person_role_id', $quality_person_role->id)
            ->first();
        //return ($quality_question_student);

        $quality_answers = QualityAnswer::where('quality_person_role_id', $quality_person_role->id)
            ->where('quality_question_id', $quality_question_student->id)
            ->where('created_at', '>=', Carbon::now()->subYear())  // Filtrira odgovore iz zadnjega leta
            ->get();
        //return ($quality_answers);
        $quality_answers_last = QualityAnswer::where('quality_person_role_id', $quality_person_role->id)
            ->where('quality_question_id', $quality_question_student->id)
            ->where('created_at', '>=', Carbon::now()->subYear())  // Filtrira odgovore iz zadnjega leta
            ->latest()  // Razvrsti rezultate po datumu (najnovejši najprej)
            ->take(50)  // Omeji na zadnjih 50 odgovorov
            ->get();
        //return ($quality_answers_last);


        // Število vseh odgovorov
        $totalAnswers = $quality_answers->count();
        $totalAnswers_last = $quality_answers_last->count();

        // Filtriranje po skupinah
        $promoters = $quality_answers->where('quality_answer_value', '>=', 9)->count();
        $passives = $quality_answers->whereBetween('quality_answer_value', [7, 8])->count();
        $detractors = $quality_answers->where('quality_answer_value', '<=', 6)->count();
        
        $promoters_last = $quality_answers_last->where('quality_answer_value', '>=', 9)->count();
        $passives_last = $quality_answers_last->whereBetween('quality_answer_value', [7, 8])->count();
        $detractors_last = $quality_answers_last->where('quality_answer_value', '<=', 6)->count();

        
        // Izračun NPS
        $school_nps = 0;
        if ($totalAnswers > 0) {
            $school_nps = (($promoters - $detractors) / $totalAnswers) * 100;
        }
       

        $school_nps_last = 0;
        if ($totalAnswers_last > 0) {
            $school_nps_last = (($promoters_last - $detractors_last) / $totalAnswers_last) * 100;
        }

        $change_in_nps = $school_nps_last - $school_nps;

        //return ($change_in_nps);

        // Izračunamo odstotno spremembo
        if ($school_nps_last != 0) {
            $school_nps_percentage_change = (($change_in_nps) / $school_nps) * 100;
        } else {
            $school_nps_percentage_change = 0;  // Če je `school_nps_last` 0, sprememba ni mogoče izračunati
        }
        //return($school_nps_percentage_change);


        


        return view('school.home')
        ->with('school_nps_percentage_change',$school_nps_percentage_change)
        ->with('school_nps',$school_nps)
        ->with('post_categories',$post_categories)
            ->with('person',$person)
            ->with('posts',$posts)
            ->with('school_conferences', $school_conferences)
            ->with('quality_campaigns', $quality_campaigns)
            ->with('school_events', $school_events)
            ->with('weekly_events', $weekly_events)
            ->with('all_events', $all_events)
            ->with('school_year', $school_year)
            ->with('school_areas', $school_areas)
            ->with('school_organization', $school_organization);
    }

    public function about($school_id)
    {
        //return(1);
        $school_organization = SchoolOrganization::find($school_id);
        //return($school_organization);

        return view('school.school.about')
            ->with('school_organization', $school_organization);

    }

    public function social_medias($school_id)
    {
        //return(1);
        $school_organization = SchoolOrganization::find($school_id);
        //return($school_organization);

        return view('school.school.social_medias')
            ->with('school_organization', $school_organization);

    }
    public function files($school_id)
    {
        //return(1);
        $user = Auth::user();
        $person = $user->active_status->person;
        $school_organization = SchoolOrganization::find($school_id);
        //return($school_organization);

        return view('school.school.files')
        ->with('person', $person)
        ->with('school_organization', $school_organization);

    }
}
