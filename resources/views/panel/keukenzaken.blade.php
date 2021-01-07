@extends('layouts.dashboard')
@section('content')
    <div class="container">

        <form action="/findcompany" method="GET">
        <div class="search">
            <input type="text" class="searchTerm" name="pBedrijf" placeholder="bedrijf...">
            <button type="submit" class="searchButton">
              <i class="fa fa-search"></i>
           </button>
         </div>
        </form>
        @if (empty($search))
        <div class="d-flex justify-content-center">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Bedrijfsnaam</th>
                    <th scope="col">Bedrijfswebsite</th>
                    <th scope="col">Plaats</th>
                    <th scope="col">Straatnaam</th>
                    <th scope="col">Huisnummer</th>
                    <th scope="col">Postcode</th>
                    <th scope="col">email</th>
                    <th scope="col">status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bedrijven ?? '' as $bedrijf )
                <tr>
                    <td>{{$bedrijf->id}}</td>
                    <td>{{$bedrijf->Bedrijfsnaam}}</td>
                    <td>{{$bedrijf->bedrijfswebsite}}</td>
                    <td>{{$bedrijf->plaats}}</td>
                    <td>{{$bedrijf->straatnaam}}</td>
                    <td>{{$bedrijf->huisnummer}}</td>
                    <td>{{$bedrijf->postcode}}</td>
                    <td>{{$bedrijf->email}}</td>
                    <td><?php 
                        if($bedrijf->approved > 0) {?> geaccepteerd <?php } else if($bedrijf->approved == 0) { ?> in afwachting <?php } else { ?> afgewezen <?php } ?></td>
                </tr>
                @endforeach
        </table>
        </div>
        @elseif (count($search) >= 1)
        <div class="d-flex justify-content-center">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Bedrijfsnaam</th>
                    <th scope="col">Bedrijfswebsite</th>
                    <th scope="col">Plaats</th>
                    <th scope="col">Straatnaam</th>
                    <th scope="col">Huisnummer</th>
                    <th scope="col">Postcode</th>
                    <th scope="col">email</th>
                    <th scope="col">status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($bedrijven ?? '' as $bedrijf )
                <tr>
                    <td>{{$bedrijf->id}}</td>
                    <td>{{$bedrijf->Bedrijfsnaam}}</td>
                    <td>{{$bedrijf->bedrijfswebsite}}</td>
                    <td>{{$bedrijf->plaats}}</td>
                    <td>{{$bedrijf->straatnaam}}</td>
                    <td>{{$bedrijf->huisnummer}}</td>
                    <td>{{$bedrijf->postcode}}</td>
                    <td>{{$bedrijf->email}}</td>
                    <td><?php 
                        if($bedrijf->approved > 0) {?> geaccepteerd <?php } else if($bedrijf->approved == 0) { ?> in afwachting <?php } else { ?> afgewezen <?php } ?></td>
                </tr>
                @endforeach
        </table>
            </div>
            @else
                Geen bedrijven gevonden
        @endif
        
</div>
@endsection