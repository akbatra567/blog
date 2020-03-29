@extends('layouts.main')

@section('title', "| $post->title ")

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }} </p>
            <hr>
            <p>Posted in:
                {{ $post->category->name }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="comments-title"><i class="fa fa-comments"></i> {{ $post->comments()->count()  }} Comments</span> </h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                   <div class="author-info">
                       <img src=" {{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=wavatar" }}" class="author-image">
                       <div class="author-name">
                       <h4>{{ $comment->name }}</h4>
                        <p class="author-time">{{ date('M j, Y h:ia', strtotime($comment->created_at)) }}</p>
                       </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2">
            <form action=" {{ route('comments.store', $post->id) }} " method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" class="form-control" rows=5></textarea>
                        <input type="submit" value="Add Comment" class="btn btn-success btn-block">
                    </div>

                </div>
                
            
            </form>
        </div>
    </div>
@endsection