@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Rezervacija broj {{ $reservation->id }}</div>
                <div class="card-body">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                              <tr><th>Dolazak</th><td>{{ $reservation->arrival_date }}</td></tr>
                              <tr><th>Odlazak</th><td>{{ $reservation->departure_date }}</td></tr>
                              <tr><th>Soba</th><td>{{ $reservation->room->number }}</td></tr>
                              <tr><th>Napomena</th><td>{{ $reservation->description }}</td></tr>
                              <tr><th>Rezervaciju napravio</th><td>{{ $reservation->user->name }}</td></tr>
                              <tr><th>Važi do</th><td>{{ $reservation->valid_until }}</td></tr>
                              <tr><th>Status</th><td>{{ $reservation->status }}</td></tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection