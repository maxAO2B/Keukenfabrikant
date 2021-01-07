@extends('layouts.dashboard')
@section('content')
    <div class="container">
    <button class="btn btn-success btn-lg"><a href="/admin/FAQ/create"> Nieuwe vraag aanmaken</a></button>
        <div class="d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Vraag</th>
                <th scope="col">Antwoord</th>
                <th scope="col">Bewerken</th>
                <th scope="col">Verwijderen</th>
            </tr>
            </thead>
            <tbody>
                @foreach($questions as $question )
            <tr>
                <th scope="row">{{$question->id}}</th>
                <td>{!! \Illuminate\Support\Str::limit($question->question ?? '',40,'...') !!}</td> 
                <td>{!! \Illuminate\Support\Str::limit($question->answer ?? '',70,'...') !!}</td>
                <td><button class="btn btn-success"><a href="/admin/FAQ/{{$question->id}}/edit">bewerken</a></button></td>
                <td>
                    {!!Form::open(['action' => ['FAQAdminController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </td>
            </tr>
            @endforeach
    </table>
    </div>
</div>
<script type="text/javascript">
    $('.confirmation').click(function(e){
        let result = confirm("Weet je zeker dat je de foto wilt verwijderen?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>
@endsection 