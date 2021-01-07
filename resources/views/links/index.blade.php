@extends('layouts.master')

@section('content')




<link href="{{ asset('css/faq.css') }}" rel="stylesheet">
<!-- begin container -->
<div class="container">
    <!-- Vragen -->
    <div class="container">
    @foreach($links as $link) 
    <div class="row">
        <div class="col-md-12">
        <!-- vraag 1 knop -->
            <p>
                <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapse{{$link->id}}" aria-expanded="false" aria-controls="collapse">{{ $link->bedrijfsnaam }}</button>
            </p>
        <!-- antwoord dat uitklapt -->
        <div class="collapse" id="collapse{{$link->id}}">
            <a href="{{ $link->link }}" class="linkbox">
                <div class="card card-body">
                    {{ $link->link }}
                </div>
            </a>
        </div>
    </div>
    </div>
    
    @endforeach

<!-- doorverwijzen naar contactformulier -->

<div class="card text-center">
  <div class="card-body">
    <h3 class="card-title">Geen antwoord gevonden op uw vraag?</h3>
    <h5 class="card-text">klik hieronder om naar contact met ons op te nemen via het contactformulier.</h5>
    <a href="/contact"><button class="btn btn-success btn-lg" type="button" >Contactpagina</button></a>
  </div>
</div>
</div> 
</div>
<!-- einde container -->

@endsection
