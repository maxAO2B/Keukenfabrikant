@extends('layouts.dashboard')
@section('content')
<div class="container">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <h2>Edit User</h2>
    {!! Form::open(['action' => ['userController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Naam')}}
            {{Form::text('name', $user->name, ['placeholder' => 'Name', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'E-mail')}}
            {{Form::text('email', $user->email, ['id' => 'article-ckeditor', 'placeholder' => 'Email', 'class' =>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('role', 'Role')}}
            <br>
            {{Form::select('role', array('empty' => 'Selecteer', 
                                         'admin' => 'Admin',
                                         'user' => 'User'))}}
        </div>
        <div class="form-group">
            {{Form::label('blocked', 'Blokkeer/De-Blokkeer gebruiker')}}
            <br>
            {{Form::select('blocked', array('empty' => 'Selecteer', 
                                         '1' => 'Blokkeer',
                                         '0' => 'De-blokkeer'))}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection