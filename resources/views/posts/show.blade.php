@extends('layouts.main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2 class="title">
                {{ $post->title }}
            </h2>
            <p class="lead"> {{ $post->body }}<p>
        </div>
        
        <div class="col-md-4">
            <div class="well">
                <dl class="row">
                    <dt class="col-md-6">Url:</dt>
                    <dd class="col-md-6"><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a> </dd>
                </dl> 
                <dl class="row">
                    <dt class="col-md-6">Created At:</dt>
                    <dd class="col-md-6">{{ date( 'M j, Y h:ia' ,strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Last Updated:</dt>
                    <dd class="col-md-6">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block') ) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id],'method'=> 'DELETE']) !!}
                        {{ Form::submit("Delete", ['class' => 'btn btn-danger btn-block']) }}
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {!! Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block'] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection