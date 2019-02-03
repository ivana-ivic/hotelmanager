@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
                <div class="card-header">Usluge
						<a href="{{ route('services.create') }}" style="float:right;" title="Nova usluga"><img style="width:26px;height:26px;" src="{{ asset('img/ic_add_circle_black_18dp_2x.png') }}" alt="Nova usluga" /></a>
				</div>
                <div class="card-body">
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
								<tr><th>Naziv</th><th>Cena</th><th></th></tr>
							@foreach ($services as $service)
                              <tr>
								<td>{{ $service->name }}</td>
								  <td>{{ $service->price }} RSD</td>
								  <td>
										<a href="{{ route('services.edit', $service) }}" title="Izmeni uslugu"><img style="float:left;width:26px;height:26px;" src="{{ asset('img/ic_edit_black_18dp_2x.png') }}" alt="Izmeni uslugu" /></a>
									  <form action="{{ route('services.destroy', $service) }}" method="POST" style="float:left;">
										@method('DELETE')
										@csrf
										<input type="image" style="float:left;width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Obriši uslugu" />
									</form>
								  </td>
								</tr>
							@endforeach
                            </tbody>
						  </table>
						  {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection