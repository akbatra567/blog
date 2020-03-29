@extends('layouts.main')
@section('title', '| Blog')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Blog</h2>
            <hr>
        </div>
    </div>

    
    @foreach ($posts as $post)  
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>{{ $post->title }}</h2>
            <h5>Published: {{ date('M j, Y  h:ia' ,strtotime($post->created_at)) }}</h5>
            <p>{{ substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }} </p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        <hr>
    @endforeach
        
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection