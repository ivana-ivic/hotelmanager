@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sobe</div>
                <div class="card-body">
                    @if(count($rooms) > 0)
                        <div class="panel-body">
                            <table class="table table-bordered">
                            <tbody>
                                <tr><th>Broj sobe</th><th>Tip</th><th>Opis</th></tr>
                                @for($i = 0; $i < count($rooms); $i++)
                                
                                    <tr><td><a href="{{ URL::route('rooms.show', $rooms[$i]->id) }}">{{ $rooms[$i]->number }}</a></td>
                                        <td>{{ $rooms[$i]->type }}</td>
                                        <td>{{ $rooms[$i]->description }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                            </table>
                        </div>
                    @else
                        <p>Nema soba</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection