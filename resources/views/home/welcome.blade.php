@extends('layouts.main')
@section('title', '| Homepage')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome to my blog!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="post">
                        <h2>{{ $post->title }}</h2>
                        <p> {{ substr($post->body,0, 300) }}{{ strlen($post->body) > 100 ? "..." : "" }}</p>
                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                    <hr>    
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1 ">
                <h2>Sidebar</h2>
                Aliqua culpa ut Lorem dolore officia dolor ut ut eiusmod consequat ullamco aliqua nisi. Quis do cillum irure in dolore anim nisi in adipisicing ea. Irure culpa duis ea do labore pariatur quis occaecat magna in ipsum ad officia. Ut est consectetur sit ad officia.
            </div>
        </div>
@endsection
