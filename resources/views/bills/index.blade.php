@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			<div class="card">
                <div class="card-header">Računi</div>
                <div class="card-body">
                    @if(count($bills) > 0)
                        <div class="panel-body">
                            <table class="table">
                            <tbody>
                                @foreach ($bills as $bill)
                                    <tr>
										<td><a href="/bills/{{ $bill->id }}">
											R{{ $bill->id }}/B{{ $bill->stay->id }} - Iznos: {{ $bill->amount }}</a>
										</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    @else
                    <p style="color:#a0a0a0; font-style: italic;">Nema računa</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection