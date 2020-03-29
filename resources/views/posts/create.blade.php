@extends('layouts.main')
@section('stylesheets')
    {{ Html::style('css/select2.min.css') }}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.1/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector : 'textarea'
        });
    </script>
@endsection
@section('title', '| Create New Post')
@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Create New Post</h2>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                {{ Form::label('title', 'Title:')  }}
                {{  Form::text('title', null, array('class' => 'form-control' ) )}}

                {{ Form::label('slug', 'Slug:')  }}
                {{  Form::text('slug', null, array('class' => 'form-control' ) )}}

                {{ Form::label('category_id', 'Category:') }}
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->name }}</option> 
                    @endforeach
                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option> 
                    @endforeach
                </select>

                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image', null, ['class' => 'form-control']) }}

                {{ Form::label('body', 'Post Body:')  }}
                {{  Form::textarea('body', null, ['class' => 'form-control'])}}
                
                {{  Form::submit('Create Post', ['class' => 'btn btn-success btn-lg', 'style' => 'margin-top: 20px;' ] )}}
            
            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')
    {{ Html::script('js/select2.min.js') }} 
    <script>
        $('.select2-multi').select2();

    </script>
@endsection