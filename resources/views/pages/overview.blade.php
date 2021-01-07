@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<div class="container">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
        Overzicht van jouw advertenties
     </h3>
    <a href="/posts/create" class="btn btn-success">Vraag een advertentie aan</a>
        <div class="d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">titel</th>
                <th scope="col">status</th>
                <th scope="col">bewerken</th>
                <th scope="col">verwijder</th>
                <th>Zie voorbeeld</th>
            </tr>
            </thead>
            <tbody>
                @foreach($posts as $post )
            <tr>
                <td>{{$post->title}}</td>
                @if($post->approved == 0)
                <td>Wachtend op goedkeuring</td>
                @elseif($post->approved == 1)
                <td>goedgekeurd, wachtend op betaling</td>
                @elseif($post->approved == 2)
                <td>niet goedgekeurd</td>
                @elseif($post->approved == 3)
                <td>betaald en geplaatst</td>
                @endif
                <td><button class="btn btn-success"><a style="color:white" href="/posts/{{$post->id}}/edit">bewerken</a></button></td>
                <td>
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
                <td><button class="btn btn-dark"><a style="color:white" href="/posts/{{$post->id}}/example">voorbeeld</a></button></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        $('.confirmation').click(function(e){
            let result = confirm("Weet je zeker dat je de foto wilt verwijderen?");
            if(!result) {
                e.preventDefault();
            }
        });
    </script>   
</div>
@endsection
