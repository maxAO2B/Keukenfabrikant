@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
                <div class="card-header">
                    <p class="green-text">Keukenzaak | Aanvraagformulier</p></div>
                <div class="card-body">
                    <form method="POST" action="/aanvragen">
                        @csrf
                        <div class="form-group row">
                            <label for="bedrijfsnaam" class="col-md-4 col-form-label text-md-right">Bedrijfsnaam</label>

                            <div class="col-md-6">
                                <input id="bedrijfsnaam" type="text" class="custom-input" placeholder="Bedrijfsnaam..." name="bedrijfsnaam" required autocomplete="name" autofocus>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bedrijfswebsite" class="col-md-4 col-form-label text-md-right">Bedrijfswebsite</label>

                            <div class="col-md-6">
                                <input id="bedrijfsebsite" type="text" class="custom-input" placeholder="https:///www.voorbeeld.com" name="bedrijfswebsite" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plaats" class="col-md-4 col-form-label text-md-right">Plaats</label>

                            <div class="col-md-6">
                                <input id="plaats" type="text" class="custom-input" placeholder="Plaats..." name="plaats"  required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="straatnaam" class="col-md-4 col-form-label text-md-right">Straatnaam</label>

                            <div class="col-md-6">
                                <input id="straatnaam" type="text" class="custom-input" placeholder="Straatnaam..." name="straatnaam" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="huisnummer" class="col-md-4 col-form-label text-md-right">Huisnummer</label>

                            <div class="col-md-6">
                                <input id="huisnummer" type="text" class="custom-input"  placeholder="Huisnummer..." name="huisnummer" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">Postcode</label>

                            <div class="col-md-6">
                                <input id="postcode" type="text" class="custom-input" placeholder="0000AZ" name="postcode" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="custom-input @error('email') is-invalid @enderror" placeholder="voorbeeld@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Wachtwoord</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Wachtwoord..." class="custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Wachtwoord bevestigen</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Bevestig wachtwoord" class="custom-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display:block">
                                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Aanvragen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
