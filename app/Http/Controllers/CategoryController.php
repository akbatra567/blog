<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Session;
class CategoryController extends Controller
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

        $categories = Category::all();

        return view('categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save a new category and redirect to index
        $request->validate([
            'name' => 'required | max:255'
        ]);
            $category = new Category;
            $category->name = $request['name'];
            $category->save();

            Session::flash('success', 'New Category has been created');
            
            return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit')->withCategory($category);
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

         // save a new category and redirect to index
         $request->validate([
            'name' => 'required | max:255'
        ]);
            $category = Category::findOrFail($id);
            $category->name = $request['name'];
            $category->save();

            Session::flash('success', 'New Category has been Updated');
            
            return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success', 'The Category was successfully Deleted!');
        return redirect()->route('categories.index');

    }
}
