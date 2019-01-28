@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Racuni</h1>
			<ul>
			@foreach ($bills as $bill)
				<li>
					<a href="/bills/{{ $bill->id }}">
						{{ $bill->stay()->name }} : {{ $bill->amount }}
					</a>
				</li>
			@endforeach
			</ul>
        </div>
    </div>
</div>

@endsection