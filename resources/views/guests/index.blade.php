@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Gosti</h1>
			<ul>
			@foreach ($guests as $guest)
				<li>
					<a href="/guests/{{ $guest->id }}">
						{{ $guest->first_name }} {{ $guest->last_name }}
					</a>
				</li>
			@endforeach
			</ul>
        </div>
    </div>
</div>

@endsection