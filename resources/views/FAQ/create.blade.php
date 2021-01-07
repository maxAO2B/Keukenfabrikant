@extends('layouts.dashboard')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <h2>Vraag aanmaken</h2>
    {!! Form::open(['action' => 'FAQAdminController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
    </div>
    <div class="form-group">
        <div class="custom-file">
        {{Form::file('cover_image', ['class' => 'custom-file-input'])}}
            <label class="custom-file-label" for="customFileLangHTML" data-browse="Bestand kiezen">Afbeelding toevoegen</label>
        </div>
    </div>
        <div class="form-group">
            {{Form::label('question', 'Vraag')}}
            {{Form::text('question', '', ['placeholder' => 'Vraag', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('answer', 'Antwoord')}}
            {{Form::textarea('answer', '', ['id' => 'article-ckeditor', 'placeholder' => 'Antwoord', 'class' =>'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection