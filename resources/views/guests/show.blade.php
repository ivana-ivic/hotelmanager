@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div>
				Ime:
				{{ $guest->first_name }}
			</div>
			<div>
				Prezime:
				{{ $guest->last_name }}
			</div>
			<div>
				Datum rodjenja:
				{{ $guest->date_of_birth }}
			</div>
			<div>
				Zemlja:
				{{ $guest->country }}
			</div>
			<div>
				Identifikacija:
				{{ $guest->identification_doc }}
			</div>
			<div>
				E-mail:
				{{ $guest->email }}
			</div>
        </div>
    </div>
</div>

@endsection