@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

			<div>
				Boravak:
				{{ $bill->stay->check_in_time }} {{ $bill->stay->memo }}
			</div>
			<div>
				Ukupno:
				{{ $bill->amount }}
			</div>
        </div>
    </div>
</div>

@endsection