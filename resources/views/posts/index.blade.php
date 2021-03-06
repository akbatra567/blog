@extends('layouts.main')
@section('title', '| All Posts')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Create New Post</a>
        </div>
        <hr>
    </div>    
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags($post->body), 0, 100) }} {{ strlen( strip_tags($post->body)) > 100 ? "...See more" : "" }} </td>
                        <td>{{ date( 'M j, Y h:ia' ,strtotime($post->created_at)) }} </td>
                        <td> <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">View</a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@stop
