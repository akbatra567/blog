@extends('layouts.main')
@section('title', '| About')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="">About {{ $fullname }}</h2>
            <p>Email me at {{ $email }}
                Nisi ipsum eiusmod id dolore. Dolor Lorem incididunt labore irure eiusmod consectetur nostrud est labore Lorem. Dolor nisi ipsum incididunt ex cillum.
            </p>
        </div>
    </div>
@endsection
