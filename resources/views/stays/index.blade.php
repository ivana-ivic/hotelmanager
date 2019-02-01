@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
				<div class="card">
						<div class="card-header">Boravci 
							<a href="{{ URL::route('stays.create') }}" style="float:right;" title="Novi boravak"><img style="width:26px;height:26px;" src="{{ asset('img/ic_add_circle_black_18dp_2x.png') }}" alt="Novi boravak" /></a>
						</div>
						<div class="card-body">
								<div class="panel-body">
									<table class="table table-bordered">
									<tbody>
										<tr><th>Broj</th><th>Vreme prijave</th><th>Vreme odjave</th></tr>
										@foreach ($stays as $stay)
											<tr>
												<td><a href="/stays/{{ $stay->id }}">{{ $stay->id }}</a></td>
												<td>{{ $stay->check_in_time }}</td>
												<td>
													@if($stay->check_out_time == '0000-00-00 00:00:00')
													-
													@else
													{{ $stay->check_out_time }}
													@endif
												</td>
											</tr>
										@endforeach
									</tbody>
									</table>
								</div>
						</div>
					</div>
        </div>
    </div>
</div>

@endsection