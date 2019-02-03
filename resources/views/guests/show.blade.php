@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
				<div class="card">
						<div class="card-header">Detalji o gostu</div>
						<div class="card-body">
							<div class="panel-body">
								<table class="table table-bordered">
									<tbody>
									  <tr><th>Ime</th><td>{{ $guest->first_name }}</td></tr>
									  <tr><th>Prezime</th><td>{{ $guest->last_name }}</td></tr>
									  <tr><th>Datum rođenja</th><td>{{ $guest->date_of_birth }}</td></tr>
									  <tr><th>Zemlja</th><td>{{ $guest->country }}</td></tr>
									  <tr><th>Broj dokumenta</th><td>{{ $guest->identification_doc }}</td></tr>
									  <tr><th>E-mail</th><td>{{ $guest->email }}</td></tr>
									</tbody>
								  </table>
							</div>
						</div>
					</div>
        </div>
    </div>
</div>

@endsection