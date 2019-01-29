@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Izmena rezervacija') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('reservations.update', $reservation) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="number" class="col-md-4 control-label">Dolazak</label>

                            <div class="col-md-6">
                                <input id="arrival_date" type="date" name="arrival_date" value="{{ $reservation->arrival_date }}" min="2019-01-01" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="departure_date" class="col-md-4 control-label">Odlazak</label>

                            <div class="col-md-6">
                                <input id="departure_date" type="date" name="departure_date" value="{{ $reservation->departure_date }}" max="2021-01-01" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="room" class="col-md-4 control-label">Soba</label>

                            <div class="col-md-6">
                                <select id="room" class="form-control" name="room" value="{{ $reservation->room_id }}" required>
                                    @if(count($rooms) > 0)
                                        @for($i = 0; $i < count($rooms); $i++)
                                            <option value="{{ $rooms[$i]->id }}" @if ($reservation->room_id == $rooms[$i]->id) selected="selected" @endif>{{ $rooms[$i]->number }}</option>
                                        @endfor
                                    @else
                                        <p>Nema slobodnih soba</p>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ $reservation->description }}" required>{{ $reservation->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="valid_until" class="col-md-4 control-label">Važi do</label>

                            <div class="col-md-6">
                                <input id="valid_until" type="date" name="valid_until" value="{{ $reservation->valid_until }}" min="2019-01-01" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status" value="{{ $reservation->status }}" required>
                                  <option value="V" @if ($reservation->status == 'V') selected="selected" @endif>Validna</option>
                                  <option value="O" @if ($reservation->status == 'O') selected="selected" @endif>Otkazana</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Potvrdi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
