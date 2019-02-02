@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
                <div class="card-header">Novi gost</div>

                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="/guests">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="first_name" class="col-md-4 control-label">Ime</label>
                            <div class="col-md-6">
                                <input id="first_name" type="input" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label">Prezime</label>
                            <div class="col-md-6">
                                <input id="last_name" type="input" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
								<label for="date_of_birth" class="col-md-4 control-label">Datum rođenja</label>
	
								<div class="col-md-6">
									<input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" max="2001-01-01" required>
								</div>
						</div>

						<div class="form-group">
								<label for="country" class="col-md-4 control-label">Zemlja</label>
								<div class="col-md-6">
									<input id="country" type="input" class="form-control" name="country" value="{{ old('country') }}" required>
								</div>
						</div>

						<div class="form-group">
								<label for="identification_doc" class="col-md-4 control-label">Broj dokumenta</label>
								<div class="col-md-6">
									<input id="identification_doc" type="input" class="form-control" name="identification_doc" value="{{ old('identification_doc') }}" required>
								</div>
						</div>

						@if (isset($stay))
						<input type="hidden" id="stay" name="stay" value="{{ $stay }}">
						@endif

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Kreiraj gosta
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