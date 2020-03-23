@extends('main')

@section('title', '| View Post')

@section('content')
    <h2 class="title">
        {{ $post->title }}
    </h2>
<p class="lead"> {{ $post->body }}<p>
@endsection