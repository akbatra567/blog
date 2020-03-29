@extends('layouts.main')

@section('title', '| Edit Comment')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Comment</h1>
            <form action=" {{route('comments.update', $comment->id)}} " method="POST">
            @csrf @method('PUT')
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{$comment->name}}" disabled>
            
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{$comment->email}}" disabled>

            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control">{{$comment->comment}}</textarea>

            <input type="submit" class="btn btn-success btn-block">

        </form>
        </div>
    </div>
@endsection