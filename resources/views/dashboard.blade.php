@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="panel-body">
                    <a href="/posts/create" class="btn btn-default">Create Posts</a>
                    <h3>Your Blog Posts</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts1 as $post)
                        <tr>
                        <th>{{$post->title}}</th>
                            <th><a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a></th>
                            <th>
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-dark'])}}
                                {!!Form::close()!!}
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
