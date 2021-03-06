@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
				<div class="card">
						<div class="card-header">Račun broj {{ $bill->id }}
							<form action="{{ route('bills.destroy', $bill) }}" method="POST" style="float:right;">
							@method('DELETE')
							@csrf
								<input type="image" style="float:right; width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Delete" />
                    		</form>
						</div>
						<div class="card-body">
							<div class="panel-body">
								<div class="form-group">
									<h5>Oznaka: </h5><p>R{{ $bill->id }}/B{{ $bill->stay->id }}</p>
								</div>
								<div class="form-group">
									<h5>Vreme kreiranja: </h5><p>{{ $bill->created_at }}</p>
								</div>
								<div class="form-group">
									<h5>Usluge: </h5>
									@if(count($bill->stay->services) > 0)
									<table class="table table-bordered">
										<tbody>
											<tr><th>Usluga</th><th>Cena</th><th>Količina</th><th>Datum</th></tr>
											@foreach ($bill->stay->services as $service)
											<tr><td>{{ $service->name }}</td>
											<td>{{ $service->price }}</td>
											<td>{{ $service->pivot->quantity }}</td>
											<td>{{ $service->pivot->date }}</td></tr>
											@endforeach
										</tbody>
									</table>
									@else
									<p style="color:#a0a0a0; font-style: italic;">Nema usluga</p>
									@endif
								</div>
								<div>
									<h5>Napomena: </h5>
									<p>{{ $bill->stay->memo }}</p>
								</div>
								<div class="form-control">
									<h4>Ukupan iznos: {{ $bill->amount }}</h4>
								</div>
								<div>
									<a href="{{ route('bills.email', $bill) }}">Prosledi korisniku</a>
								</div>
							</div>
						</div>
					</div>
        </div>
    </div>
</div>

@endsection