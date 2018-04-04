@extends('layouts.app.sidebar')

@section('page_title', 'Neue Veranstaltung - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>Veranstaltung erstellen</h1>
		<br>
		<form method="post" action="{{ action('EventController@store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title" hidden>Titel</label>
				<input name="title" id="title" class="form-control" placeholder="Titel" value="{{ old('title') }}">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>&nbsp;</label>
						<label for="date" hidden>Datum</label>
						<input name="date" id="date" class="form-control" placeholder="Datum/Zeitraum"
							   value="{{ old('date') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="img">Promo-Bild</label>
						<input name="img" id="img" class="form-control" placeholder="Promo-Bild"
							   value="{{ old('img') }}" type="file"
							   accept="image/jpeg,image/png,image/x-png,image/gif">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="summernote" hidden>Inhalt</label>
				<textarea id="summernote" name="body" rows="8">{{ old('body') }}</textarea>
			</div>
			<div class="form-group">
				<label for="link" hidden>"Weitere Informationen ..."-Link</label>
				<input name="link" id="link" class="form-control" placeholder='"Weitere Infos"-Link'
					   value="{{ old('link') }}">
			</div>
			<button class="btn btn-outline-primary" style="width: 100%">Speichern und veröffentlichen</button>
		</form>
	</div>
	<script>
		$(document).ready(function () {
			$('#summernote').summernote({
				placeholder: 'Inhalt',
				minHeight: 200,
				lang: 'de-DE',
				dialogsInBody: false,
				toolbar: [
					['style', ['bold', 'italic', 'underline', 'clear']],
					[''], [''],
					['font', ['strikethrough', 'superscript', 'subscript']],
					[''], [''],
					['link', ['linkDialogShow', 'unlink']]
				]
			});
		});
	</script>
@endsection

@push('styles')
	<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endpush

@push('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/lang/summernote-de-DE.min.js"></script>
@endpush
