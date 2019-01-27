@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
            	<h1>Kreiraj novi boravak</h1>
            </div>
            <div>
				<form method="POST" action="/stays">
					{{ csrf_field() }}
					<div>
						<label for="check_in_time">Vreme prijave:</label>
						<input type="text" name="check_in_time" class="input" placeholder="Check-in time" value="">
					</div>
					<div>
						<label for="memo">Memo:</label>
						<input type="text" name="memo" class="input" placeholder="Memo" value="">
					</div>
					<div>
						@if(!$services->isEmpty())
							<label for="services">Usluge:</label>
							<select id="service_select">
								@foreach($services as $service)
									<option value="{{$service->id}}">{{ $service->name }} - {{ $service->price }}</option>
								@endforeach
							</select>
							<input type="button" value="Dodaj u listu" onclick="addToList()">
						@endif
					</div>
					<div>
						<ul id="list-chosen">
						</ul>
					</div>
					<div>

						<button type="submit">Kreiraj boravak</button>
					</div>
					@include('errors')
				</form>
			</div>
        </div>
    </div>
</div>

@include('javascript')

@endsection