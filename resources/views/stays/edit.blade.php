{{-- @extends('layouts.app')

@section('content')

	<h1 class="title">Izmeni boravak</h1>

	<form method="POST" action="/stays/{{ $project->id }}" >
		@method('PATCH')
		@csrf
		<div class='field'>
			<label class="label" for="title">Title</label>

			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
			</div>
		</div>

		<div class="field">
			<label class="label" for="description">Description</label>
			<div>
				<textarea name="description" class="textarea">{{ $project->description }}</textarea>
			</div>
		</div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Update project</button>
			</div>
		</div>
	</form>

	<form method="POST" action="/projects/{{$project->id}}">
		@method('DELETE')
		@csrf
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">Delete project</button>
			</div>
		</div>
	</form>
@endsection --}}