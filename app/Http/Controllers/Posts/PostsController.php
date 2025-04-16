<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Models\Posts\Post;
use App\Models\Posts\PostCategory;
use App\Models\Posts\PostTag;
use App\Models\Posts\PostPostTag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    { 
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Pridobimo vse kategorije
        $post_categories = PostCategory::all();

        // Pridobimo obstoječe oznake
        $existingTags = PostTag::pluck('post_tag_name')->toArray();

        // Posredujemo podatke v pogled
        return view('posts.create')
            ->with('post_categories', $post_categories)
            ->with('existingTags', $existingTags);
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
        //return($request);
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_summary' => 'required|string|max:500',
            'post_content' => 'required',
            'post_category_id' => 'required|exists:post_categories,id',
            'post_tags' => 'nullable|string', // Oznake so string, npr. "tag1,tag2"
            'post_cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=978,height=400',
            'post_reading_time' => 'required|numeric|min:1',
        ], [
            'post_cover_image.image' => 'Datoteka mora biti slika.',
            'post_cover_image.mimes' => 'Dovoljeni formati so: jpeg, png, jpg, gif, svg.',
            'post_cover_image.max' => 'Slika ne sme biti večja od 2 MB.',
            'post_cover_image.dimensions' => 'Slika mora biti točno dimenzij 978x400 pikslov.',
            'post_title.required' => 'Naslov prispevka je obvezen.',
            'post_title.max' => 'Naslov prispevka ne sme presegati 255 znakov.',
            'post_summary.required' => 'Povzetek je obvezen.',
            'post_summary.max' => 'Povzetek ne sme presegati 500 znakov.',
            'post_content.required' => 'Vsebina prispevka je obvezna.',
            'post_category_id.required' => 'Kategorija prispevka je obvezna.',
            'post_category_id.exists' => 'Izbrana kategorija ne obstaja.',
            'post_tags.string' => 'Oznake morajo biti v obliki niza, ločenega z vejico.',
            'post_cover_image.image' => 'Naslovna slika mora biti v formatu slike (jpeg, png, jpg, gif, svg).',
            'post_cover_image.mimes' => 'Naslovna slika mora biti ena od vrst: jpeg, png, jpg, gif, svg.',
            'post_cover_image.max' => 'Naslovna slika ne sme biti večja od 2 MB.',
            'post_reading_time.required' => 'Čas branja je obvezen.',
            'post_reading_time.numeric' => 'Čas branja mora biti številka.',
            'post_reading_time.min' => 'Čas branja mora biti vsaj 1 minuta.',
        ]);


    
        $user = Auth::user();
        $user_active_status = $user->active_status;
        $person = $user_active_status->person;


        $post = new Post();
        $post->author_id = $person->id;
        $post->post_title = $request->input ('post_title');
        $post->post_summary = $request->input ('post_summary');
        $post->post_key_thought = $request->input ('post_key_thought');
        $post->post_content = $request->input ('post_content');
        $post->post_comments_enabled = 0;
        $post->post_topic = null;
        $post->post_category_id = $request->input ('post_category_id');
        $post->post_reading_time = $request->input ('post_reading_time');
        $post->post_status = 'published';
        $post->post_views = 0;
        $post->post_valid_from = Carbon::now();
        $post->post_published_at = Carbon::now();
        $post->post_is_global = 0;
        $post->school_organization_id  = $person->school_organization_id;

        $post->post_slug  = Str::slug($request->input('post_title'));;
        $post->save();


        // Posodobimo naslovno sliko (če obstaja nova)
        if ($request->hasFile('post_cover_image')) {
            // Originalna slika
            $filenameWithExt = $request->file('post_cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('post_cover_image')->getClientOriginalExtension();
        
            // Generiranje imena za shranjevanje originalne slike
            $fileNameToStore = 'post_cover_image' . $post->id . '_' . time() . '.' . $extension;
        
            // Shranjevanje originalne slike
            $path = $request->file('post_cover_image')->storeAs('public/posts', $fileNameToStore);
            $post->post_cover_image = $fileNameToStore;
        
            // Ustvarjanje 978x400 različice
            $fileNameToStore978x400 = 'post_cover_image' . $post->id . '_' . time() . '_978x400.' . $extension;
            $image978x400 = Image::make($request->file('post_cover_image'))->resize(978, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image978x400->save(storage_path('app/public/posts/' . $fileNameToStore978x400));
            $post->post_cover_image_978x400 = $fileNameToStore978x400;
        
            // Ustvarjanje 400x400 različice
            $fileNameToStore400x400 = 'post_cover_image' . $post->id . '_' . time() . '_400x400.' . $extension;
            $image400x400 = Image::make($request->file('post_cover_image'))->fit(400, 400);
            $image400x400->save(storage_path('app/public/posts/' . $fileNameToStore400x400));
            $post->post_cover_image_400x400 = $fileNameToStore400x400;
        }
        
        // Shranjevanje podatkov v bazo
    
        $post->save();
    
        // Obdelava oznak
        if ($request->post_tags) {
            // Razdelimo niz oznak na posamezne oznake (ločene z vejico)
            $tags = array_map('trim', explode(',', $request->post_tags));

            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);

                // Poiščemo obstoječo oznako po `post_tag_name`
                $postTag = \App\Models\Posts\PostTag::where('post_tag_name', $tagName)->first();

                if ($postTag) {
                    // Če oznaka obstaja, pridobimo njen ID
                    $tagIds[] = $postTag->id;
                } else {
                    // Če oznaka ne obstaja, vrnemo napako
                    return redirect()->back()->withErrors([
                        'post_tags' => "Oznaka '{$tagName}' ne obstaja. Prosimo, najprej dodajte to oznako v sistem."
                    ]);
                }
            }

            // Povežemo prispevek z obstoječimi oznakami
            $post->tags()->sync($tagIds);
        }
        
        
        return redirect()->route('posts.index')->with('success', 'Prispevek uspešno dodan.');
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
        $post = Post::with('author', 'category', 'tags', 'comments')->findOrFail($id);
        return view('school.posts.show', compact('post'));
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
        // Pridobimo prispevek ali vrnemo 404
        $post = Post::findOrFail($id);

        // Pridobimo vse kategorije
        $post_categories = PostCategory::all();

        // Pridobimo vse obstoječe oznake
        $existingTags = PostTag::pluck('post_tag_name')->toArray();


        return view('posts.edit')
            ->with('post', $post)
            ->with('post_categories', $post_categories)
            ->with('existingTags', $existingTags);


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
        //return($request);
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_summary' => 'required|string|max:500',
            'post_content' => 'required',
            'post_category_id' => 'required|exists:post_categories,id',
            'post_tags' => 'nullable|string', // Oznake so string, npr. "tag1,tag2"
            'post_cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=978,height=400',
            'post_reading_time' => 'required|numeric|min:1',
        ], [
            'post_cover_image.image' => 'Datoteka mora biti slika.',
            'post_cover_image.mimes' => 'Dovoljeni formati so: jpeg, png, jpg, gif, svg.',
            'post_cover_image.max' => 'Slika ne sme biti večja od 2 MB.',
            'post_cover_image.dimensions' => 'Slika mora biti točno dimenzij 978x400 pikslov.',
            'post_title.required' => 'Naslov prispevka je obvezen.',
            'post_title.max' => 'Naslov prispevka ne sme presegati 255 znakov.',
            'post_summary.required' => 'Povzetek je obvezen.',
            'post_summary.max' => 'Povzetek ne sme presegati 500 znakov.',
            'post_content.required' => 'Vsebina prispevka je obvezna.',
            'post_category_id.required' => 'Kategorija prispevka je obvezna.',
            'post_category_id.exists' => 'Izbrana kategorija ne obstaja.',
            'post_tags.string' => 'Oznake morajo biti v obliki niza, ločenega z vejico.',
            'post_cover_image.image' => 'Naslovna slika mora biti v formatu slike (jpeg, png, jpg, gif, svg).',
            'post_cover_image.mimes' => 'Naslovna slika mora biti ena od vrst: jpeg, png, jpg, gif, svg.',
            'post_cover_image.max' => 'Naslovna slika ne sme biti večja od 2 MB.',
            'post_reading_time.required' => 'Čas branja je obvezen.',
            'post_reading_time.numeric' => 'Čas branja mora biti številka.',
            'post_reading_time.min' => 'Čas branja mora biti vsaj 1 minuta.',
        ]);


    
        $user = Auth::user();
        $user_active_status = $user->active_status;
        $person = $user_active_status->person;

        $post = Post::findOrFail($id);

        $post->author_id = $person->id;
        $post->post_title = $request->input ('post_title');
        $post->post_summary = $request->input ('post_summary');
        $post->post_key_thought = $request->input ('post_key_thought');
        $post->post_content = $request->input ('post_content');
        $post->post_comments_enabled = 0;
        $post->post_topic = null;
        $post->post_category_id = $request->input ('post_category_id');
        $post->post_reading_time = $request->input ('post_reading_time');
        $post->post_status = 'published';
        $post->post_views = 0;
        $post->post_valid_from = Carbon::now();
        $post->post_published_at = Carbon::now();
        $post->post_is_global = 0;
        $post->school_organization_id  = $person->school_organization_id;

        $post->post_slug  = Str::slug($request->input('post_title'));;


        // Posodobimo naslovno sliko (če obstaja nova)
        if ($request->hasFile('post_cover_image')) {
            // Originalna slika
            $filenameWithExt = $request->file('post_cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('post_cover_image')->getClientOriginalExtension();
        
            // Generiranje imena za shranjevanje originalne slike
            $fileNameToStore = 'post_cover_image' . $post->id . '_' . time() . '.' . $extension;
        
            // Shranjevanje originalne slike
            $path = $request->file('post_cover_image')->storeAs('public/posts', $fileNameToStore);
            $post->post_cover_image = $fileNameToStore;
        
            // Ustvarjanje 978x400 različice
            $fileNameToStore978x400 = 'post_cover_image' . $post->id . '_' . time() . '_978x400.' . $extension;
            $image978x400 = Image::make($request->file('post_cover_image'))->resize(978, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image978x400->save(storage_path('app/public/posts/' . $fileNameToStore978x400));
            $post->post_cover_image_978x400 = $fileNameToStore978x400;
        
            // Ustvarjanje 400x400 različice
            $fileNameToStore400x400 = 'post_cover_image' . $post->id . '_' . time() . '_400x400.' . $extension;
            $image400x400 = Image::make($request->file('post_cover_image'))->fit(400, 400);
            $image400x400->save(storage_path('app/public/posts/' . $fileNameToStore400x400));
            $post->post_cover_image_400x400 = $fileNameToStore400x400;
        }
        
        // Shranjevanje podatkov v bazo
    
        $post->save();
    
        // Obdelava oznak
        if ($request->post_tags) {
            // Razdelimo niz oznak na posamezne oznake (ločene z vejico)
            $tags = array_map('trim', explode(',', $request->post_tags));

            $tagIds = [];
            foreach ($tags as $tagName) {
                $tagName = trim($tagName);

                // Poiščemo obstoječo oznako po `post_tag_name`
                $postTag = \App\Models\Posts\PostTag::where('post_tag_name', $tagName)->first();

                if ($postTag) {
                    // Če oznaka obstaja, pridobimo njen ID
                    $tagIds[] = $postTag->id;
                } else {
                    // Če oznaka ne obstaja, vrnemo napako
                    return redirect()->back()->withErrors([
                        'post_tags' => "Oznaka '{$tagName}' ne obstaja. Prosimo, najprej dodajte to oznako v sistem."
                    ]);
                }
            }

            // Povežemo prispevek z obstoječimi oznakami
            $post->tags()->sync($tagIds);
        }
        
        
        return redirect()->route('posts.index')->with('success', 'Prispevek uspešno posodobljen.');


    
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
        $post = Post::findOrFail($id); // Poišče post ali vrne 404
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Prispevek uspešno izbrisan.');
    }
}
