@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
                <div class="card-header">Izmena boravaka</div>

                <div class="card-body">
					<form id="stay-form" class="form-horizontal" method="POST" action="{{ route('stays.update', $stay) }}">
						{{ method_field('PUT') }}
						{{ csrf_field() }}

						<div class="form-group">
								<label for="guest" class="col-md-4 control-label">Gost</label>
	
								<div class="col-md-6">
										<a href="/guests/create/0" class="button"><img style="width:26px;height:26px;" src="{{ asset('img/ic_person_add_black_18dp_2x.png') }}" alt="Dodaj gosta" /></a>
										
										<select id="guest" class="form-control" name="guest" value=@if($stay->guest()->exists())"{{ $stay->guest->id }}"@else "" @endif required>
										@if(count($guests) > 0)
											@for($i = 0; $i < count($guests); $i++)
												<option value="{{ $guests[$i]->id }}" @if ($stay->guest_id == $guests[$i]->id) selected="selected" @endif>{{ $guests[$i]->first_name }} {{ $guests[$i]->last_name }}</option>
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
									<select id="room" class="form-control" name="room" value="{{ $stay->room_id }}" required>
										@if(count($rooms) > 0)
											@for($i = 0; $i < count($rooms); $i++)
												<option value="{{ $rooms[$i]->id }}" @if ($stay->room_id == $rooms[$i]->id) selected="selected" @endif>{{ $rooms[$i]->number }}</option>
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
								<textarea id="memo" class="form-control" name="memo" value="{{ $stay->memo }}" required>{{ $stay->memo }}</textarea>
							</div>
						</div>

						@if(!$services->isEmpty())
                        <div class="form-group">
                            <label for="services" class="col-md-4 control-label">Usluge</label>

                            <div class="col-md-6">
                                <select id="service_select" class="form-control" name="services" value="{{ $stay->services }}" required>
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
								@if(!$stay->services->isEmpty())
									@foreach($stay->services as $service)
										<li>
											{{$service->name}}
											{{-- <input type="checkbox" name="services[]" value="{{$service->id}}" checked hidden> --}}
											<input type="hidden" name="service" value="{{$service->id}}">
											<input type="number" name='quantity' value="{{$service->pivot->quantity}}">
											<input type="hidden" name="pivot_id" value="{{$service->pivot->id}}">
											<input type="button" value="Izbrisi" onclick="removeFromList(this)">
										</li>
									@endforeach
								@endif
							</ul>
						</div>

						<input type="hidden" id='services-hidden' name="services-list" value=''>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Potvrdi izmene
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




{{-- @extends('layouts.app')

@section('content')

	<h1 class="title">Izmeni boravak</h1>

	<form method="POST" action="/stays/{{ $project->id }}" >
		@method('PATCH')
		@csrf
		<div class='field'>
			<label class="label" for="title">Title</label>

			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
			</div>
		</div>

		<div class="field">
			<label class="label" for="description">Description</label>
			<div>
				<textarea name="description" class="textarea">{{ $project->description }}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Update project</button>
			</div>
		</div>
	</form>

	<form method="POST" action="/projects/{{$project->id}}">
		@method('DELETE')
		@csrf
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Delete project</button>
			</div>
		</div>
	</form>
@endsection --}}