@extends('layouts.master')
@section('content')
<a href="/overview" class="btn btn-dark">Go to dashboard</a><br><br>
<h1>{{$post->title}}</h1>
<a href="/profile/{{$post->user_id}}" style="text-decoration: none; color: black;"><small>geschreven door {{$post->user->name}} op {{$post->created_at}}</small></a>
<div>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <hr>
    <h4>
    {{$post->body}}
    </h4>
</div>
<hr>
@endsection
