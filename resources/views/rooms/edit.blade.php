@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Izmena sobe') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('rooms.update', $room) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="number" class="col-md-4 control-label">Broj</label>

                            <div class="col-md-6">
                                <input id="number" type="input" class="form-control" name="number" value="{{ $room->number }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Kapacitet</label>

                            <div class="col-md-6">
                                <input id="type" type="input" class="form-control" name="type" value="{{ $room->type }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Cena</label>

                            <div class="col-md-6">
                                <input id="price" type="input" class="form-control" name="price" value="{{ $room->price }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ $room->description }}" required>{{ $room->description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="active" class="col-md-4 control-label">Aktivna?</label>

                            <div class="col-md-6">
                                <input id="active" type="checkbox" class="form-control" name="active" @if($room->active) checked @endif >
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
