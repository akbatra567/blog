@extends('layouts.main')
@section('title', '| Edit Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <label for="name">Tag:</label>
                <input type="text" name="name" class="form-control" value="{{ $tag->name }} ">
                <a href=" {{ route('tags.index') }} " class="btn btn-primary">Cancel</a>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection