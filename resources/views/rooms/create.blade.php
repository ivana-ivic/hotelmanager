@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nova soba') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('rooms.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="number" class="col-md-4 control-label">Broj</label>

                            <div class="col-md-6">
                                <input id="number" type="input" class="form-control" name="number" value="{{ old('number') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Kapacitet</label>

                            <div class="col-md-6">
                                <input id="type" type="input" class="form-control" name="type" value="{{ old('type') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Cena</label>

                            <div class="col-md-6">
                                <input id="price" type="input" class="form-control" name="price" value="{{ old('price') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Opis</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" value="{{ old('description') }}" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="active" class="col-md-4 control-label">Aktivna?</label>

                            <div class="col-md-6">
                                <input id="active" type="checkbox" class="form-control" name="active">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj
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
