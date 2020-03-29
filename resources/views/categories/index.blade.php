@extends('layouts.main')
@section('title', '| Categories')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>No. Of Post</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td> {{ $category->id }} </td>
                            <td> {{ $category->name }} </td>
                            <td> {{ $category->posts->count()  }} </td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-default btn-xs">View</a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>
        </div> {{-- End of col-md-8 --}}
        <div class="col-md-3">
            <div class="well">
                <form action=" {{ route('categories.store') }} " method="POST">
                    @csrf
                    <h3>Create New Category</h3>
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Category">
                    <input type="submit" value="Create New Category" class="btn btn-primary btn-block ">
                </form>
            </div>
        </div>
    </div>
@endsection