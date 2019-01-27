@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
            	<h1>Create a new guest</h1>
            </div>
            <div>
				<form method="POST" action="/guests">
					{{ csrf_field() }}
					<div>
						<label for="check_in_time">Check in time:</label>
						<input type="text" name="check_in_time" class="input" placeholder="Check-in time" value="">
					</div>
					<div>
						<label for="memo">Memo:</label>
						<input type="text" name="memo" class="input" placeholder="Memo" value="">
					</div>
					<div>

						<button type="submit">Create Stay</button>
					</div>
				</form>
			</div>
        </div>
    </div>
</div>
@endsection