<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'title'             => 'required|unique:posts|max:255|min:3',
            'slug'              => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'       => 'required | integer',
            'body'              => 'required',
            'featured_image'    => 'sometimes|image|max:20000',
        ]);

        # Store in database
        $post = new Post;
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->body = Purifier::clean($request['body']);
        $post->category_id = $request['category_id'];

        // save our image
        if($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension(); 
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $post->image = $filename;
        }

        $post->save();
        $post->tags()->sync($request->tags, false);
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
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category)
            $cats[$category->id] = $category->name;

        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag)
            $tags2[$tag->id] = $tag->name;
    
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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

            $request->validate([
                'title'             => 'required|max:255|min:3',
                'slug'              => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id'       => 'required | integer',
                'body'              => 'required',
                'featured_image'    => 'sometimes|image'
            ]);          
        
        $post = Post::findOrFail($id);
        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->category_id = $request['category_id'];
        $post->body = Purifier::clean($request['body']);

        if($request->hasFile('featured_image'))
        {
            // Add new photo
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension(); 
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFileName = $post->image; 
            
            // Update database
            $post->image = $filename;
             
            // Delete old photo
            Storage::delete($oldFileName);
        }

        $post->save();

        $post->tags()->sync($request->tags, true);
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
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success', 'The blog post was successfully Deleted!');
        return redirect()->route('posts.index');

    }
}
