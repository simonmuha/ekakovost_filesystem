<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Posts\Post;
use App\Models\Posts\PostCategory;
use App\Models\Posts\PostView;

class SchoolPostsController extends Controller
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
        $latest_post = Post::orderBy('post_published_at', 'desc')->first();
        $latest_posts = Post::orderBy('post_published_at', 'desc')->take(3)->get();

        $post_categories = PostCategory::where('parent_id', null)->take(5)->get();
        return view('school.posts.index')
            ->with('latest_post',$latest_post)
            ->with('latest_posts',$latest_posts)
            ->with('post_categories',$post_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $post = Post::with('author', 'category', 'tags', 'comments')->findOrFail($id);
        $user = Auth::user();
        $user_active_status = $user->active_status;
        $person = $user_active_status->person;
        PostView::updateOrCreate(
            [
                'post_id' => $post->id,
                'person_id' => $person->id,
            ],
            [] // Dodatni podatki (če jih imate)
        );
        $post_categories = PostCategory::where('parent_id', null)->take(5)->get();
        $post = Post::with('author', 'category', 'tags', 'comments')->findOrFail($id);
        return view('school.posts.show', compact('post', 'post_categories'));
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
