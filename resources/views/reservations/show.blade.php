@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Rezervacija broj {{ $reservation->id }}
                    <a href="{{ URL::route('reservations.destroy', $reservation) }}" style="float:right;" title="Obriši rezervaciju"><img style="width:28px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Obriši rezervaciju" /></a>
                    <a href="{{ URL::route('reservations.edit', $reservation) }}" style="float:right;" title="Izmeni rezervaciju"><img style="width:26px;height:26px;" src="{{ asset('img/ic_edit_black_18dp_2x.png') }}" alt="Izmeni rezervaciju" /></a>
            </div>
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