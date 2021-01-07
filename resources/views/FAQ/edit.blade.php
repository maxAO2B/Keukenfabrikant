@extends('layouts.dashboard')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <h2>Vraag aanmaken</h2>
     {!! Form::open(['action' => ['FAQAdminController@update', $question->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
    </div>
        <div class="form-group">
            {{Form::label('question', 'Vraag')}}
            {{Form::text('question', $question->question, ['placeholder' => 'Vraag', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('answer', 'Antwoord')}}
            {{Form::textarea('answer', $question->answer, ['id' => 'article-ckeditor', 'placeholder' => 'Antwoord', 'class' =>'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection