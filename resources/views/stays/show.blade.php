@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
				<div class="card-header">Boravak broj {{ $stay->id }}
						<form action="{{ route('stays.destroy', $stay) }}" method="POST" style="float:right;">
							@method('DELETE')
							@csrf
							<input type="image" style="float:right; width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Delete" />
						</form>
						@if($stay->check_out_time == '0000-00-00 00:00:00')
						<a href="{{ route('stays.edit', $stay) }}" style="float:right;" title="Izmeni boravak"><img style="width:26px;height:26px;" src="{{ asset('img/ic_edit_black_18dp_2x.png') }}" alt="Izmeni boravak" /></a>
						@endif
				</div>
                <div class="card-body">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                            	<tr><th>Gost</th><td><a href="{{ route('guests.show', $stay->guest) }}">{{ $stay->guest->first_name }} {{ $stay->guest->last_name }}</a></td></tr>
								<tr><th>Vreme prijave</th><td>{{ $stay->check_in_time }}</td></tr>
								<tr><th>Vreme odjave</th><td>
								  @if($stay->check_out_time == '0000-00-00 00:00:00')
								  <form action="{{ route('stays.checkout', $stay) }}" method="POST">
										@method('PUT')
										@csrf
										<button type="submit" class="form-control" style="color:#e80000">Odjava</button>
									</form>
								  @else
								  {{ $stay->check_out_time }}
								  @endif
								</td>
								</tr>
								<tr><th>Soba</th><td>{{ $stay->reservation->room->number }}</td></tr>
								<tr><th>Reservacija</th><td><a href="{{ route('reservations.show', $stay->reservation ) }}" title="Rezervacija">{{ $stay->reservation->id }}</a></td></tr>
								<tr><th>Napomena</th><td>{{ $stay->memo }}</td></tr>
                            </tbody>
						  </table>
						  
						<div>
							<h4>Uključene usluge:</h4>
						</div>
						@if ($stay->services->count())
							<table class="table">
								<tbody>
									@foreach ($stay->services as $service)
									<tr><th>Usluga</th><td>{{ $service->pivot->date }}</td></tr>
									<tr><th>Cena</th><td>{{ $service->name }}</td></tr>
									<tr><th>Količina</th><td>{{ $service->pivot->quantity }}</td></tr>
									<tr><th>Datum</th><td>{{ $service->price }}</td></tr>
									@endforeach
								</tbody>
							</table>
						@else
						<p style="color:#a0a0a0; font-style: italic;">Nema usluga</p>
						@endif
						<div>
							@if (!isset($stay->bill))
								<a href='/stays/{{$stay->id}}/bills'>Kreiraj račun</a>
							@else
								<a href='/bills/{{$stay->bill->id}}'>Prikaži račun</a>
							@endif
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection