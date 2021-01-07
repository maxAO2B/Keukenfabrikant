@extends('layouts.master')
@section('content')


        <h3 class="mt-3 pb-3 mb-4 border-bottom">
                Keuken Nieuws
            </h3>
            <div class="row">
            @if(count($posts1) > 0)
            @foreach($posts1 as $post)
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
        </div>

      <h3 class="pb-3 mb-4 border-bottom">
         Keukens
      </h3>
      <div class="row">
         @if(count($posts2) > 0)
         @foreach($posts2 as $post)
         <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
               <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2">Keuken te koop</strong>
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
            <img class="card-img-right flex-auto d-none d-lg-block" alt="" src="/storage/cover_images/{{$post->cover_image}}" style="width: 275px; height: 225px;">
         </div>
      </div>
      @endforeach
      @else
         <p>no posts found</p>
      @endif
      </div>
         <a class="btn btn-success btn-sm all" href="/keukens">Bekijk alle keukens</a>
     <!-- </div> -->
@endsection