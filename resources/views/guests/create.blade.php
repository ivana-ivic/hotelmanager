@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
            	<h1>Kreiraj novog gosta</h1>
            </div>
            <div>
				<form method="POST" action="/guests">
					{{ csrf_field() }}
					<div>
						<label for="first_name">Ime:</label>
						<input type="text" name="first_name" class="input" placeholder="Ime" value="">
					</div>
					<div>
						<label for="last_name">Prezime:</label>
						<input type="text" name="last_name" class="input" placeholder="Prezime" value="">
					</div>
					<div>
						<label for="date_of_birth">Datum rodjenja:</label>
						<input type="text" name="date_of_birth" class="input" placeholder="Datum rodjenja" value="">
					</div>
					<div>
						<label for="country">Zemlja:</label>
						<input type="text" name="country" class="input" placeholder="Zemlja" value="">
					</div>
					<div>
						<label for="identification_doc">Identifikacija:</label>
						<input type="text" name="identification_doc" class="input" placeholder="Identifikacija" value="">
					</div>
					@if (isset($stay))
						<input type="hidden" id="stay" name="stay" value="{{ $stay }}">
					@endif
					<div>

						<button type="submit">Kreiraj gosta</button>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>
@endsection