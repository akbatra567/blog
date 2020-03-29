@extends('layouts.main')
@section('title', '| Delete Comment')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <p>
                <strong>Name:</strong>{{$comment->name}}
                <strong>Email:</strong>{{$comment->email}}
                <strong>Comment:</strong>{{$comment->comment}}
            </p>

            <form action=" {{route('comments.destroy', $comment->id)}} " method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Yes, Delete the comment" class="btn btn-lg btn-danger">
            </form>
        </div>
    </div>
@endsection