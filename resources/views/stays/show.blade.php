@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div>
        		Boravak
        	</div>
			<div>
				{{ $stay->check_in_time }}
				{{ $stay->memo }}
			</div>
			
			@if ($stay->services->count())
			<div>
				Servisi:
			</div>
			<div>
				@foreach ($stay->services as $service)

					<div class="box">
						{{$service->pivot->date}} - {{$service->name}} : {{$service->price}} Kolicina:{{ $service->pivot->quantity}}
					</div>
				@endforeach
			</div>
			@endif
			<div>
				@if (!isset($stay->bill))
					<a href='/stays/{{$stay->id}}/bills'>Kreiraj racun</a>
				@else
					<a href='/bills/{{$stay->bill->id}}'>Prikazi racun</a>
				@endif

			</div>

        </div>
    </div>
</div>

@endsection