@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div>
				{{ $stay->memo }}
			</div>
			
			@if ($stay->services->count())
			<div>
				@foreach ($stay->services as $service)

					<div class="box">
						{{$service->date}} - {{$service->name}} : {{$service->price}}
					</div>
				@endforeach
			</div>
			@endif
			<div>
			</div>

        </div>
    </div>
</div>

@endsection