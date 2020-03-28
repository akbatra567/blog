@extends('layouts.main')
@section('stylesheets')
    {{ Html::style('css/select2.min.css') }}
@endsection
@section('title', '| Edit Blog Post')
@section('content')
{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
    <div class="row">
        <div class="col-md-8">
            {{ Form::label('title', "Title:") }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}
            
            {{ Form::label('slug', "Slug:") }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}

            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:') }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

            {{ Form::label('body', "Body:") }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}    
        </div>
        <div class="col-md-4">
            <div class="well">
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
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-primary btn-block') ) !!}
                    </div>
                    <div class="col-md-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@endsection
@section('scripts')
    {{ Html::script('js/select2.min.js') }} 
    <script>
        $('.select2-multi').select2();

    </script>
@endsection