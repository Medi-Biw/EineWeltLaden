@extends('layouts.app.sidebar')

@section('page_title', 'Veranstaltung bearbeiten - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>Veranstaltung bearbeiten</h1>
		<br>
		<form method="post" action="{{ action('EventController@update', $event->id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('put') }}
			<div class="form-group">
				<label for="title" hidden>Titel</label>
				<input name="title" id="title" class="form-control" placeholder="Titel"
					   value="{{ old('title') ?? $event->title ?? null }}">
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="date" hidden>Datum</label>
						<input name="date" id="date" class="form-control" placeholder="Datum/Zeitraum">
					</div>
					<div class="form-group">
						<label for="img">Promo-Bild</label>
						<input name="img" id="img" class="form-control" placeholder="Promo-Bild"
							   value="{{ old('img') ?? null }}" type="file"
							   accept="image/jpeg,image/png,image/x-png,image/gif">
					</div>
					<div class="form-group">
						@if($event->image)
							<label class="form-control">
								<input name="del-img" type="checkbox" value="1">
								<span>Bild entfernen</span>
							</label>
						@endif
					</div>
				</div>
				<div class="col-md-6" style="padding-bottom: 1rem">
					@if($event->image)
						<img src="data:image/jpg;base64,{{ $event->image }}" class="img-fluid" style="max-height: 400px">
					@endif
				</div>
			</div>
			<div class="form-group">
				<label for="summernote" hidden>Inhalt</label>
				<textarea id="summernote" name="body" rows="8">{{ old('body') ?? $event->body ?? null }}</textarea>
			</div>
			<div class="form-group">
				<label for="link" hidden>"Weitere Informationen ..."-Link</label>
				<input name="link" id="link" class="form-control" placeholder='"Weitere Infos"-Link'
					   value="{{ old('link') ?? $event->more_link ?? null }}">
			</div>
			<button class="btn btn-outline-primary" style="width: 100%">Änderungen Speichern</button>
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
			$('#date').daterangepicker({
				"showDropdowns": true,
				"showWeekNumbers": true,
				@php
					$dates = explode('/', $event->date);
				@endphp

				"startDate": "{{ @date('Y-m-d', @strtotime(@$dates[0])) }}",
				"endDate": "{{ @date('Y-m-d', @strtotime(@$dates[1])) }}",
				"locale": {
					"format": "YYYY-MM-DD",
					"separator": " bis ",
					"applyLabel": "Anwenden",
					"cancelLabel": "Abbrechen",
					"fromLabel": "Von",
					"toLabel": "Bis",
					"customRangeLabel": "Benutzerdefiniert",
					"weekLabel": "W",
					"daysOfWeek": [
						"So",
						"Mo",
						"Di",
						"Mi",
						"Do",
						"Fr",
						"Sa"
					],
					"monthNames": [
						"Januar",
						"Februar",
						"März",
						"April",
						"Mai",
						"Juni",
						"Juli",
						"August",
						"September",
						"Oktober",
						"November",
						"Dezember"
					],
					"firstDay": 1
				}
			}, function(start, end, label) {
				console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
			});
		});
	</script>
@endsection

@push('styles')
	<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet" />
	<link href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/lang/summernote-de-DE.min.js"></script>
	<script src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
@endpush
