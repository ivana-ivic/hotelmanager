@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Stays</h1>
			<ul>
			@foreach ($stays as $stay)
				<li>
					<a href="/stays/{{ $stay->id }}">
						{{ $stay->check_in_time }}
					</a>
					{{ $stay->memo }}
				</li>
			@endforeach
			</ul>
        </div>
    </div>
</div>

@endsection