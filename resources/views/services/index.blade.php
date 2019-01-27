@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Usluge</h1>
			<ul>
			@foreach ($services as $service)
				<li>
					<a href="/services/{{ $service->id }}">
						{{ $service->name }} - {{ $service->price }}
					</a>
				</li>
			@endforeach
			</ul>
        </div>
    </div>
</div>

@endsection