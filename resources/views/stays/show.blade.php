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
				{{-- <form method="POST" action="/stays/{{$stay->id}}/services">
					@csrf

					<div class="box">
						<label class="label" for="date">Dan</label>

						<div class="control">
							<input type="text" class="input" name="date" placeholder="">
						</div>
					</div>

					<div class="box">
						<label class="label" for="name">Naziv usluge</label>

						<div class="control">
							<input type="text" class="input" name="name" placeholder="">
						</div>
					</div>

					<div class="box">
						<label class="label" for="price">Cena</label>

						<div class="control">
							<input type="text" class="input" name="price" placeholder="">
						</div>
					</div>

					<div class="field">
						<div class="control">
							<button type="submit" class="button is-link">Kreiraj novu uslugu</button>
						</div>
					</div>
				</form> --}}
			</div>

        </div>
    </div>
</div>

@endsection