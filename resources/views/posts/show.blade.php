@extends('layouts.master')
@section('content')
<div class="container">
    <a href="/" class="btn"><strong><h1>&#x2190;</h1></strong></a>
    <h1>{{$post->title}}</h1>
    <a href="/profile/{{$post->user_id}}" style="text-decoration: none; color: black;"><small>Geschreven door <strong>{{$post->user->name}}</strong> op <strong>{{$post->created_at}}</strong></small></a>
    
        <hr class="hr-post">
        <br>
        <div class="row justify-content-center">
            <img class="postimage" src="/storage/cover_images/{{$post->cover_image}}">
        </div>
        <br>
        <hr>
        <h5>
        {!! nl2br(e($post->body)) !!}
        <h5>
        <hr class="hr-post">
    <button class="btn btn-sm btn-app" href="https://wa.me/?text=https://www.keukenfabrikant.nl"><i class="fab fa-whatsapp"></i> Delen via Whatsapp</button>
         <div class="fb-share-button" data-href="https://www.keukenfabrikant.nl" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.keukenfabrikant.nl%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Delen</a></div>
         <!-- <a href="http://www.facebook.com/share.php?u=httpskeukenfabrikant.nl/posts/{{$post->id}}"><div class="btn btn-sm btn-primary">Facebook2</div></a> -->
        <div class="row">
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-trash">Bewerken</a>
                <br>
                <br>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                <br>
                <br>
            @elseif(Auth::user()->role == 'admin')
                <a href="/posts/{{$post->id}}/edit" class="btn btn-trash">edit</a>
                <br>
                <br>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
                <br>
                <br>
            @endif
        </div>
        

        <div class="row">
            <div class="col-md-8">
            <!-- vraag 1 knop -->
                <p>
                    <button class="btn btn-success btn-lg" id="commentplaatsbtn" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">Plaats reactie</button>
                </p>
            <!-- antwoord dat uitklapt -->
            <div class="collapse" id="collapse">
                <div id="comment-form" style="margin-top: 30px;">
                    {!!Form::open(['route' => ['comments.stored', $post->id], 'method' => 'POST'])!!}
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::textarea('comment', null, ['class' => 'form-control', 'id' => 'commenttextarea', 'rows' => '4', 'placeholder' => 'Typ hier uw reactie...'])}} 
                                {{Form::submit('Reactie plaatsen', ['type' => 'button', 'class' => 'btn btn-success'])}}
                            </div>
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

        
    @endif
    <div class="row">
        {{-- <div class="col-md-12" style="margin-top: 30px;"> --}}
            <div class="comment-container">
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <br/>
                        <p class="small-p"> Reactie van <strong>{{$comment->name}}</strong> </p>
                        <div class="comment-text">{!! nl2br(e($comment->comment)) !!}</div>
                        @if(!Auth::guest())
                        @if(Auth::user()->role == 'admin')
                        {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'col-xs-offset-2'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Verwijder', ['class' => 'btn btn-trash'])}}
                        {!!Form::close()!!}
                        @endif
                        @endif
                        <br>
                        <p class="footer-comment">{{$comment->created_at}} </p>
                    </div>
                @endforeach
            </div>
        </div>
    {{-- </div> --}}
</div>
@endsection