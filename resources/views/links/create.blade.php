@extends('layouts.master')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <h2>link aanmaken</h2>
    {!! Form::open(['action' => 'LinksAdminController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
    </div>
        <div class="form-group">
            {{Form::label('bedrijfsnaam', 'Bedrijfsnaam')}}
            {{Form::text('bedrijfsnaam', '', ['placeholder' => 'bedrijfsnaam', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('link', 'Link')}}
            {{Form::textarea('link', '', ['id' => 'article-ckeditor', 'placeholder' => 'www.voorbeeld.nl', 'class' =>'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection