@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Soba broj {{ $room->number }}</div>
                <div class="card-body">
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                              <tr><th>ID</th><td>{{ $room->id }}</td></tr>
                              <tr><th>Broj</th><td>{{ $room->number }}</td></tr>
                              <tr><th>Tip</th><td>{{ $room->type }}</td></tr>
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