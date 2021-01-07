@extends('layouts.master')
@section('content')
<link href="{{ asset('css/faq.css') }}" rel="stylesheet">
<!-- begin container -->
<div class="container">
    <!-- jumbotron header -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">veelgestelde vragen</h1>
            <p class="lead">Heeft u een vraag over het kiezen, kopen of plaatsen van uw keuken? Op deze pagina beantwoorden we veelgestelde keukenvragen. Niet gevonden wat u zocht? Neem dan gerust contact met ons op.</p>
        </div>
    </div>
    
    <!-- Vragen -->

    <div class="container">
    @foreach($FAQ as $question) 
    <div class="row">
        <div class="col-md-12">
        <!-- vraag 1 knop -->
            <p>
                <button class="btn btn-success btn-lg" type="button" data-toggle="collapse" data-target="#collapse{{$question->id}}" aria-expanded="false" aria-controls="collapse">{{ $question->question }}</button>
            </p>
        <!-- antwoord dat uitklapt -->
        <div class="collapse" id="collapse{{$question->id}}">
            <div class="card card-body">
               {{ $question->answer }}
            </div>
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