@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rezervacije</div>
                <div class="card-body">
                    @if(count($reservations) > 0)
                        <div class="panel-body">
                            <table class="table table-bordered">
                            <tbody>
                                <tr><th>Broj rezervacije</th><th>Status</th><th>Dolazak</th></tr>
                                @for($i = 0; $i < count($reservations); $i++)
                                    <tr><td><a href="{{ URL::route('reservations.show', $reservations[$i]->id) }}">{{ $reservations[$i]->id }}</a></td>
                                        <td>{{ $reservations[$i]->status }}</td>
                                        <td>{{ $reservations[$i]->arrival_date }}</td>
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