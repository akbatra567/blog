@extends('layouts.main')
@section('title', '| Edit Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <label for="name">Categories:</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }} ">
                <a href=" {{ route('categories.index') }} " class="btn btn-primary">Cancel</a>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection