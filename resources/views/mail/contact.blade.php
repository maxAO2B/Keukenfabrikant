@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
			<div class="card-header">
				<p class="green-text">Contact formulier | Neem contact op</p>
			</div>
			<div class="card-body">
				<form id="validation" method="POST" action="">
					{{ csrf_field() }}
						<div class="form-group row">
							<label for="first" class="col-md-4 col-form-label text-md-right">Voornaam</label>
							<div class="col-md-6">
								<input type="text" class="custom-input" name="first" placeholder="Voornaam" required>
							</div>
							<div class="invalid-feedback">
							Vul een voornaam in.
							</div>
						</div>
						
						<div class="form-group row">
							<label for="mid" class="col-md-4 col-form-label text-md-right">Tussenvoegsel</label>
							<div class="col-md-6">
								<input type="text" class="custom-input" name="mid" placeholder="Tussenvoegsel">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="last" class="col-md-4 col-form-label text-md-right">Achternaam</label>
							<div class="col-md-6">
								<input type="text" class="custom-input" name="last" placeholder="Achternaam" required>
							</div>
							<div class="invalid-feedback">
								Vul een achternaam in.
							</div>
						</div>
				
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>
							<div class="col-md-6">
								<input type="email" class="custom-input" name="email" placeholder="E-mail" required>
							</div>
							<div class="invalid-feedback">
								Vul een geldige email in
							</div>
						</div>
				
						<div class="form-group row">
							<label for="confirmEmail" class="col-md-4 col-form-label text-md-right">Bevestig E-mail</label>
							<div class="col-md-6">
								<input type="text" class="custom-input" name="confirmEmail" placeholder="Bevestig e-mail" required>
							</div>
							<div class="invalid-feedback">
								E-mail komt niet overeen.
							</div>
						</div>
				
						<div class="form-group row">
							<label for="phone" class="col-md-4 col-form-label text-md-right">Telefoonnummer (Niet verplicht)</label>
							<div class="col-md-6">
								<input type="text" class="custom-input" name="phone" placeholder="Telefoonnummer (Niet verplicht)">
							</div>
						</div>
						
						<div class="form-group row">
							<label for="message" class="col-md-4 col-form-label text-md-right">Bericht</label>
							<div class="col-md-6">
							<textarea class="custom-input" name="message" rows="5" placeholder="Typ hier je bericht..." required></textarea>
							</div>
						</div>
			
						<button type="submit" href="succes" class="btn btn-primary btn-block small-text"><span><strong>Verstuur</strong></span></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js'></script>
<script src="{{asset('js/validation.js')}}"></script>
@endsection