@extends('layouts.main')
@section('title', '| Tags')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td> {{ $tag->id }} </td>
                            <td> {{ $tag->name }} </td>
                            <td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-xs">View</a></td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>
        </div> {{-- End of col-md-8 --}}
        <div class="col-md-3">
            <div class="well">
                <form action=" {{ route('tags.store') }} " method="POST">
                    @csrf
                    <h3>Create New Tag</h3>
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Tag">
                    <input type="submit" value="Create New Tag" class="btn btn-primary btn-block ">
                </form>
            </div>
        </div>
    </div>
@endsection

