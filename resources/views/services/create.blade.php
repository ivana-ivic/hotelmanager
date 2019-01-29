@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
            	<h1>Kreiraj novu uslugu</h1>
            </div>
            <div>
				<form method="POST" action="/services">
					{{ csrf_field() }}
					<div>
						<label for="name">Naziv:</label>
						<input type="text" name="name" class="input"  value="">
					</div>
					<div>
						<label for="price">Cena:</label>
						<input type="text" name="price" class="input"  value="">
					</div>
					<div>

						<button type="submit">Kreiraj uslugu</button>
					</div>
					@include('errors')
				</form>
			</div>
        </div>
    </div>
</div>
@endsection