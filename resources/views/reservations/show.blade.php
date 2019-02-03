@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Rezervacija broj {{ $reservation->id }}
                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" style="float:right;">
                        @method('DELETE')
                        @csrf
                        <input type="image" style="float:right; width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Delete" />
                    </form>
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
                              <tr><th>Status</th><td @if($reservation->status == 'V') style="color:#309e2a" @else style="color:#e01818" @endif>@if($reservation->status == 'V') Validna @else Otkazana @endif</td></tr>
                              @if($reservation->stay()->exists())
                              <tr><th>Boravak</th><td>
                                <a href="{{ route('stays.show', $reservation->stay)}}">{{ $reservation->stay->check_in_time }} {{ $reservation->memo }}</a>
                              </td></tr>
                              @else
                              <tr>
                                <td>
                                  <a href="{{route('reservations.stay', $reservation)}}">Prijavi boravak</a>
                                </td>
                              </tr>
                              @endif
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection