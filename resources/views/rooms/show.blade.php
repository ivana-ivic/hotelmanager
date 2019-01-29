@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Soba broj {{ $room->number }} 
                    <form action="{{ route('rooms.destroy', $room) }}" method="POST" style="float:right;">
                        @method('DELETE')
                        @csrf
                        <input type="image" style="float:right; width:26px;height:26px;" src="{{ asset('img/ic_delete_forever_black_18dp_2x.png') }}" alt="Delete" />
                    </form>
                    <a href="{{ URL::route('rooms.edit', $room) }}" style="float:right;" title="Izmeni sobu"><img style="width:26px;height:26px;" src="{{ asset('img/ic_edit_black_18dp_2x.png') }}" alt="Izmeni sobu" /></a>
                </div>
                <div class="card-body">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                              <tr><th>ID</th><td>{{ $room->id }}</td></tr>
                              <tr><th>Broj</th><td>{{ $room->number }}</td></tr>
                              <tr><th>Kapacitet</th><td>{{ $room->type }}</td></tr>
                              <tr><th>Opis</th><td>{{ $room->description }}</td></tr>
                              <tr><th>Aktivna</th><td>{{ $room->active }}</td></tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection