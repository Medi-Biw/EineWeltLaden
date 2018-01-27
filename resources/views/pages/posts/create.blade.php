@extends('layouts.app.sidebar')

@section('sub', 'Aktuell - ')

@section('main')
	<div id="page-content">
		<h1>Beitrag erstellen</h1>
		<br>
		<form method="post" action="{{ action('PostController@store') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title" hidden>Titel</label>
				<input name="title" id="title" class="form-control" placeholder="Titel" value="{{ old('title') }}">
			</div>
			<div class="form-group">
				<label for="summernote" hidden>Inhalt</label>
				<textarea id="summernote" name="body" rows="8">{{ old('body') }}</textarea>
			</div>
			<button class="btn btn-outline-primary" style="width: 100%">Speichern und veröffentlichen</button>
		</form>
	</div>
	<script>
		$(document).ready(function() {
			$('#summernote').summernote({
				placeholder: 'Inhalt',
				minHeight: 300,
				lang: 'de-DE',
				dialogsInBody: false
			});
		});
	</script>
@endsection

@push('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endpush

@push('scripts')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/lang/summernote-de-DE.min.js"></script>
@endpush
