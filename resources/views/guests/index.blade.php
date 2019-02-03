@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
				<div class="card">
						<div class="card-header">Gosti</div>
						<div class="card-body">
							<div class="panel-body">
								<table class="table">
									<tbody>
										<tr><th>Ime i prezime</th><th>Datum rođenja</th><th>Zemlja</th><th>E-mail</th><th>Broj dokumenta</th><th></th></tr>
										@foreach ($guests as $guest)  
										<tr><td><a href="{{ URL::route('guests.edit', $guest) }}" style="float:left;" title="Izmeni gosta">{{ $guest->first_name }} {{ $guest->last_name }}</a></td>
									  	<td>{{ $guest->date_of_birth }}</td>
									  	<td>{{ $guest->country }}</td>
									  	<td>{{ $guest->email }}</td>
										<td>{{ $guest->identification_doc }}</td>
										<td>
											<form action="{{ route('guests.destroy', $guest) }}" method="POST" style="float:left;">
												@method('DELETE')
												@csrf
												<input type="image" style="float:left;width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Obriši gosta" />
											</form>
										</td>
										@endforeach  
									</tbody>
								  </table>
								  {{ $guests->links() }}
							</div>
						</div>
					</div>
        </div>
    </div>
</div>

@endsection