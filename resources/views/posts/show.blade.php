@extends('layouts.main')

@section('title', '| View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2 class="title">
                {{ $post->title }}
            </h2>
            <p class="lead"> {{ $post->body }}<p>
            <hr>
            <div class="tags">
                Tags:
                @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary"> {{ $tag->name }} </span>
                @endforeach
            </div>

            <div id="backend-comments" style="margin-top:50px">
                <h3>Comments <small> {{ $post->comments()->count() }} total </small></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comments as $comment)
                        <tr>
                            <td> {{ $comment->name }} </td>
                            <td> {{ $comment->email }} </td>
                            <td> {{ $comment->comment }} </td>
                            <td>
                                <a href=" {{ route('comments.edit', $comment->id) }} " class="btn btn-xs btn-primary"><span class="fa fa-edit"></span></a>
                                <a href=" {{ route('comments.delete', $comment->id) }} " class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="well">
                <dl class="row">
                    <dt class="col-md-6">Url:</dt>
                    <dd class="col-md-6"><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a> </dd>
                </dl> 
                <dl class="row">
                    <dt class="col-md-6">Category:</dt>
                    <dd class="col-md-6">{{ $post->category->name }}</dd>
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