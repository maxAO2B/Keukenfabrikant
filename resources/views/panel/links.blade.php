@extends('layouts.dashboard')
@section('content')
    <div class="container">
    <button class="btn btn-success btn-lg"><a href="/admin/links/create"> Nieuwe link plaatsen</a></button>
        <div class="d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">bedrijfsnaam</th>
                <th scope="col">link</th>
                <th scope="col">Bewerken</th>
                <th scope="col">Verwijderen</th>
            </tr>
            </thead>
            <tbody>
                @foreach($links as $link )
            <tr>
                <th scope="row">{{$link->id}}</th>
                <td>{!! \Illuminate\Support\Str::limit($link->bedrijfsnaam ?? '',40,'...') !!}</td> 
                <td>{!! \Illuminate\Support\Str::limit($link->link ?? '',70,'...') !!}</td>
                <td><button class="btn btn-success"><a href="/admin/links/{{$link->id}}/edit">bewerken</a></button></td>
                <td>
                    {!!Form::open(['action' => ['LinksAdminController@destroy', $link->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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