@extends('layouts.dashboard')
@section('content')
<div class="container">
    <style>
        html { scroll-behavior: smooth; }
    </style>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <h2>Create Post</h2>
    {!! Form::open(['action' => 'PostsAdminController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['placeholder' => 'Title', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Body', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::select('type', array('' => 'Selecteer een type post', 
                                         'news' => 'News', 
                                         'keuken' => 'Keukens'))}}
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-success'])}}
    {!! Form::close() !!}
    <hr>
    <br>
    </div>
@endsection