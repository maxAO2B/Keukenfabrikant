@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Bedrijfsnaam</th>
                <th scope="col">Bedrijfswebsite</th>
                <th scope="col">Plaats</th>
                <th scope="col">Straatnaam</th>
                <th scope="col">Huisnummer</th>
                <th scope="col">Postcode</th>
                <th scope="col">email</th>
                <th scope="col">Goedkeuren</th>
                <th scope="col">Afwijzen</th>

            </tr>
            </thead>
            <tbody>
                @foreach($approveUser as $bedrijf )
            <tr>
                <td>{{$bedrijf->Bedrijfsnaam}}</td>
                <td>{{$bedrijf->bedrijfswebsite}}</td>
                <td>{{$bedrijf->plaats}}</td>
                <td>{{$bedrijf->straatnaam}}</td>
                <td>{{$bedrijf->huisnummer}}</td>
                <td>{{$bedrijf->postcode}}</td>
                <td>{{$bedrijf->email}}</td>
                {{-- Goedkeur formulier --}}
                <td>
                    <form action="/keukenfabrikant/goedkeuren/{{$bedrijf->id}}" method="POST">
                        @csrf
                        <button value="{{ $bedrijf->id }}" class="btn btn-success"><i class="fas fa-check"></i></form>
                    </form>
                </td>

                {{-- Afkeurformulier --}}
                <td>
                    <form action="/keukenfabrikant/afwijzen/{{$bedrijf->id}}" method="POST">
                        @csrf
                        <button value="{{ $bedrijf->id }}" class="btn btn-danger"><i class="fas fa-times"></i></form>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </table>
    </div>
</div>


@endsection