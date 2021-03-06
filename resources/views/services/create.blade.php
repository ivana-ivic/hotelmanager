@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
                <div class="card-header">Nova usluga</div>

                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('services.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Naziv</label>

                            <div class="col-md-6">
                                <input id="name" type="input" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Cena</label>

                            <div class="col-md-6">
                                <input id="price" type="input" class="form-control" name="price" value="{{ old('price') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
										Kreiraj uslugu
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