@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div>
				Boravak:
				{{ $bill->stay()->name }}
			</div>
			<div>
				Ukupno:
				{{ $bill->amount }}
			</div>
        </div>
    </div>
</div>

@endsection