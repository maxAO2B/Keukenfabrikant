@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                    <div class="card-header"><p class="green-text">Profielgegevens bewerken</p>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => ['profileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('avatar', 'Nieuwe profielfoto')}}<br>
                        {{Form::file('avatar')}}
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Naam')}}
                        {{Form::text('name', $user->name, ['placeholder' => 'Name', 'class' =>'custom-input'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'E-mail')}}
                        {{Form::text('email', $user->email, ['id' => 'article-ckeditor', 'placeholder' => 'Email', 'class' =>'custom-input'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {{Form::submit('Updaten', ['class' =>'btn btn-success'])}}
                {!! Form::close() !!}
                <br>
                {!!Form::open(['action' => ['profileController@destroy', $user->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'], )!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Account deactiveren', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

@endsection