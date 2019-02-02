@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
                <div class="card-header">Novi boravak</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="/stays">
                        {{ csrf_field() }}

						<div class="form-group">
								<label for="guest" class="col-md-4 control-label">Gost</label>
	
								<div class="col-md-6">
										<a href="/guests/create/0" class="button"><img style="width:26px;height:26px;" src="{{ asset('img/ic_person_add_black_18dp_2x.png') }}" alt="Dodaj gosta" /></a>
									<select id="guest" class="form-control" name="guest" value="{{ old('guest') }}" required>
										@if(count($guests) > 0)
											@for($i = 0; $i < count($guests); $i++)
												<option value="{{ $guests[$i]->id }}">{{ $guests[$i]->first_name }} {{ $guests[$i]->last_name }}</option>
											@endfor
										@else
											<p>Nema slobodnih soba</p>
										@endif
									</select>
								</div>
							</div>

						<div class="form-group">
								<label for="room" class="col-md-4 control-label">Soba</label>
	
								<div class="col-md-6">
									<select id="room" class="form-control" name="room" value="{{ old('room') }}" required>
										@if(count($rooms) > 0)
											@for($i = 0; $i < count($rooms); $i++)
												<option value="{{ $rooms[$i]->id }}">{{ $rooms[$i]->number }}</option>
											@endfor
										@else
											<p>Nema slobodnih soba</p>
										@endif
									</select>
								</div>
							</div>

                        <div class="form-group">
							<label for="memo" class="col-md-4 control-label">Opis</label>
	
							<div class="col-md-6">
								<textarea id="memo" class="form-control" name="memo" value="{{ old('memo') }}" required></textarea>
							</div>
						</div>

						@if(!$services->isEmpty())
                        <div class="form-group">
                            <label for="services" class="col-md-4 control-label">Usluge</label>

                            <div class="col-md-6">
                                <select id="service_select" class="form-control" name="services" value="{{ old('services') }}" required>
                                    @foreach($services as $service)
									<option value="{{$service->id}}">{{ $service->name }} - {{ $service->price }}</option>
                                    @endforeach
								</select>	
								<input type="button" value="Dodaj u listu" class="form-control" onclick="addToList()">
                            </div>
						</div>
						@endif

						<div>
							<ul id="list-chosen">
							</ul>
						</div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Napravi boravak
                                </button>
                            </div>
                        </div>
						@include('errors')
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('javascript')

@endsection