@extends('layouts.master')
@section('content')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400|Yellowtail" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
<style>
   .profile-pic {
    background: url("/storage/uploads/avatars/{{$user->avatar}}") center no-repeat;
    background-size: cover;
  }
</style>

<!-- PAGE STUFF -->
<div class="rela-block profile-card">
   <div class="profile-pic" id="profile_pic"></div>
      <div class="rela-block profile-name-container">
         <div class="rela-block user-name" id="user_name">{{ $user->name }}</div>
            <div class="rela-block user-desc" id="user_description">
            @if(Auth::user()->id == $user->id)
               {{ $user->email }}
            @endif
            
            </div>
            <div class="editbutton">
               @if(!Auth::guest())
                  @if(Auth::user()->id == $user->id)
                     <a href="/profile/{{$user->id}}/edit" class="btn btn-success">Bewerken <i class="fas fa-user-edit"></i></a>
                  @endif
               @endif
            </div>
         </div>
      </div>
   </div>

   <h3 class="pb-3 mb-4 font-italic border-bottom">
      @if(Auth::user()->id == $user->id)
            Jouw favoriete keukens
            @else De favoriete keukens van <strong>{{$user->name}}</strong>
         @endif
   </h3>
   <div class="row">
   @foreach($posts as $post)
   <div class="col-md-6">
      <div class="card border-success flex-md-row mb-4 shadow-sm h-md-250">
         <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-success">{{$post->title}}</strong>
            <h6 class="mb-0">
               <a class="text-dark" href="../posts/{{$post->id}}">Geschreven door <strong>{{$post->user->name}}</strong></a>
            </h6>
            <div class="mb-1 text-muted small">{{$post->created_at}}</div>
               <p class="card-text mb-auto">{!! \Illuminate\Support\Str::limit($post->body ?? '',70,'...') !!}</p>
               <a class="btn btn-outline-success btn-sm" href="#">Lees meer</a>
         </div>
         <img class="card-img-right flex-auto d-none d-lg-block" alt="" src="/storage/cover_images/{{$post->cover_image}}" style="width: 200px; height: 250px;">
      </div>
   </div>
   @endforeach
   </div>

   <h3 class="mt-3 pb-3 mb-4 border-bottom">
        Keuken Nieuws
     </h3>
     <div class="row">
      @if(count($posts) > 0)
      @foreach($posts as $post)
      <div class="col-md-6">
         <div class="card flex-md-row mb-4 h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
               <strong class="d-inline-block mb-2">Keuken nieuwtjes</strong>
               <h6 class="mb-0">
                  <a class="text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
               </h6>
               <a href="/profile/{{$post->user_id}}" style="text-decoration: none; color: black;"><div class="mb-1 text-muted small">geschreven door {{$post->user->name}}</a>
            </div>
            <p class="card-text mb-auto"> {!! \Illuminate\Support\Str::limit($post->body ?? '',50,'...') !!}</p>
            <a class="btn btn-success btn-sm" href="/posts/{{$post->id}}">Lees meer</a>
            @Auth
               <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();">
                  <i class="fas fa-heart"></i>
               </a>
               <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite', $post->id) }}" style="display: none;">
                  @csrf
               </form>
            @endauth
         </div>
         <img class="card-img-right" alt="" src="/storage/cover_images/{{$post->cover_image}}">
      </div>
      </div>
      @endforeach
      @else
         <p>no posts found</p>
      @endif
      <a class="btn btn-success btn-sm all" href="/keukens">Bekijk al het niews</a>
     </div>
@endsection