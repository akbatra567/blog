<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5); 
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # validate
        $request->validate([
            'title' => 'required|unique:posts|max:255|min:3',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ]);

        # Store in database
        $post = new Post;
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->body = $request['body'];
        $post->save();

        Session::flash('success', 'The blog post was successfully saved!');

         return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit')->withPost($post);
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

        # validate

        $post = Post::find($id);
        if($request->input('slug') == $post->slug)
        {
            $request->validate([
                'title' => 'required|max:255|min:3',
                'body' => 'required'
            ]);    
        }else {
            $request->validate([
                'title' => 'required|max:255|min:3',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'body' => 'required'
            ]);
        }
          
        
        $post = Post::findOrFail($id);
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->body = $request['body'];

        $post->save();

        Session::flash('success', 'The blog post was successfully Updated!');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('success', 'The blog post was successfully Deleted!');
        return redirect()->route('posts.index');

    }
}
