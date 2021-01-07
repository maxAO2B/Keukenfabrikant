@extends('layouts.dashboard')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <h2>Edit Post</h2>
    {!! Form::open(['action' => ['PostsAdminController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        <div class="form-group">
            {{Form::label('title', 'Titel')}}
            {{Form::text('title', $post->title, ['placeholder' => 'Title', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Bericht')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'placeholder' => 'Body', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::select('type', array('empty' => 'Selecteer een type post', 
                                         'news' => 'Nieuws', 
                                         'keuken' => 'Keukens'))}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection