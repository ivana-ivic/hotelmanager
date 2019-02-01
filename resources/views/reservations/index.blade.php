@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rezervacije
                        <a href="{{ URL::route('reservations.create') }}" style="float:right;" title="Nova rezervacija"><img style="width:26px;height:26px;" src="{{ asset('img/ic_add_circle_black_18dp_2x.png') }}" alt="Nova rezervacija" /></a>
                </div>
                <div class="card-body">
                    @if(count($reservations) > 0)
                        <div class="panel-body">
                            <table class="table">
                            <tbody>
                                <tr><th>Broj rezervacije</th><th>Soba</th><th>Dolazak</th><th>Status</th><th></th></tr>
                                @for($i = 0; $i < count($reservations); $i++)
                                    <tr @if($reservations[$i]->status == 'V') style="background-color:#8cff8e" @else style="background-color:#ff7a7a" @endif>
                                        <td><a href="{{ URL::route('reservations.show', $reservations[$i]) }}">{{ $reservations[$i]->id }}</a></td>
                                        <td>{{ $reservations[$i]->room->number }}</td>
                                        <td>{{ $reservations[$i]->arrival_date }}</td>
                                        <td>@if($reservations[$i]->status == 'V') Validna @else Otkazana @endif</td>
                                        <td>
                                            <form action="{{ route('reservations.destroy', $reservations[$i]) }}" method="POST" style="float:center;">
                                                @method('DELETE')
                                                @csrf
                                                <input type="image" style="float:center; width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Delete" />
                                            </form>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                            </table>
                        </div>
                    @else
                        <p>Nema soba</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection