@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div>
				Naziv:
				{{ $service->name }}
			</div>
			<div>
				Cena:
				{{ $service->price }}
			</div>
        </div>
    </div>
</div>

@endsection