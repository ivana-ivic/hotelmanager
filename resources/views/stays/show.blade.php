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
                        <table class="table">
                            <tbody>
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
                              <tr><th>Soba</th><td>{{ $stay->room->number }}</td></tr>
							  <tr><th>Reservacija</th>
								<td>
									@if($stay->reservation)
									<a href="{{ route('reservations.show', $stay->reservation ) }}" title="Rezervacija">{{ $stay->reservation->id }}</a>
									@else
									-
									@endif
								</td>
							  </tr>
							  <tr><th>Napomena</th><td>{{ $stay->memo }}</td></tr>
							  <tr>
								<th>Podaci o gostu</th>
								<td>
									<h6>Ime i prezime: </h6><p>{{ $stay->guest->first_name }} {{ $stay->guest->last_name }}</p>
									<h6>Datum rođenja: </h6><p>{{ $stay->guest->date_of_birth }}</p>
									<h6>Zemlja: </h6><p>{{ $stay->guest->country }}</p>
									<h6>Broj dokumenta: </h6><p>{{ $stay->guest->identification_doc }}</p>
								</td>
							</tr>
							<tr>
							<th>Uključene usluge</th>
							<td>
								@if ($stay->services->count())
									<table class="table">
										<tbody>
											<tr><th>Usluga</th><th>Cena</th><th>Količina</th><th>Datum</th></tr>
											@foreach ($stay->services as $service)
											<td>{{ $service->name }}</td>
											<td>{{ $service->price }}</td>
											<td>{{ $service->pivot->quantity }}</td>
											<td>{{ $service->pivot->date }}</td></tr>
											@endforeach
										</tbody>
									</table>
								@else
								<p style="color:#a0a0a0; font-style: italic;">Nema usluga</p>
								@endif
								</td>
							</tr>
                            </tbody>
						  </table>
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

@endsection