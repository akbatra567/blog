@extends('layouts.main')
@section('title', "| $category->name Tag")
@section('content')
    <div class="row">
        <div class="col-md-8">
        <h1>Category: {{ $category->name }}  <small>   {{ $category->posts->count() }} {{ $category->posts->count() > 1 ? "Posts" : "Post"}}</small></h1>        
       </div>
       <div class="col-md-2 offset-md-2">
            <a href="{{ route('categories.edit' ,$category->id) }}" class="btn btn-primary pull-xs-right btn-block">Edit</a>
       </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->posts as $post)
                        <tr>
                            <td> {{ $post->id }} </td>
                            <td> {{ $post->title }} </td>
                            <td><a href=" {{ route('posts.show',$post->id) }} " class="btn btn-default btn-xs">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection