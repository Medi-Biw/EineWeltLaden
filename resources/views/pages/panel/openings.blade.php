@extends('layouts.app.sidebar')

@section('sub', 'Öffnungszeiten bearbeiten - ')

@section('main')
	<div id="page-content">
		<h1>Öffnungszeiten bearbeiten</h1>
		<form class="card table-responsive">
			<table class="table openings-table">
				<thead class="thead-light">
				<tr>
					<th style="width: 160px">Tag</th>
					<th class="text-center">von</th>
					<th class="text-center">bis</th>
					<th class="text-center">&</th>
					<th class="text-center">von</th>
					<th class="text-center">bis</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$days = [
					'mon' => 'Montag',
					'tue' => 'Dienstag',
					'wed' => 'Mittwoch',
					'thu' => 'Donnerstag',
					'fri' => 'Freitag',
					'sat' => 'Samstag',
					'sun' => 'Sonntag'
				]
				?>
				@foreach($days as $day => $name)
					<tr>
						<td rowspan="2" style="width: 160px">
							<strong>{{ $name }}</strong>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="closed_{{ $day }}">
								<label class="custom-control-label" for="closed_{{ $day }}">Geschlossen</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="twin_{{ $day }}">
								<label class="custom-control-label" for="twin_{{ $day }}">Zwei Zeiten</label>
							</div>
						</td>
						<td class="text-center">
							<input class="form-control text-center" value="{{ $data[$day]['from_1'] }}"
								   name="{{ $day }}[from_1]" title="1. Zeit - {{ $name }} - öffnet">
						</td>
						<td class="text-center">
							<input class="form-control text-center" value="{{ $data[$day]['till_1'] }}"
								   name="{{ $day }}[till_1]" title="1. Zeit - {{ $name }} - schließt">
						</td>
						<td></td>
						<td class="text-center">
							<input class="form-control text-center" value="{{ $data[$day]['from_2'] }}"
								   name="{{ $day }}[from_2]" title="2. Zeit - {{ $name }} - öffnet">
						</td>
						<td class="text-center">
							<input class="form-control text-center" value="{{ $data[$day]['till_2'] }}"
								   name="{{ $day }}[till_2]" title="2. Zeit - {{ $name }} - schließt">
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<input value="{{ $data[$day]['text'] }}" class="form-control" style="min-width: 500px" title="Diesem Tag Text hinzufügen" placeholder="Zusatztext"/>
							<div class="custom-control custom-checkbox" style="margin-top: 0.5rem">
								<input type="checkbox" class="custom-control-input" id="replace_{{ $day }}">
								<label class="custom-control-label" for="replace_{{ $day }}">Zusatz ersetzt Zeiten</label>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</form>
	</div>
	<script>
		$(document).ready(function(){
			$('.timep').datetimepicker({
			});
		});
	</script>
@endsection
@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endpush
@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment-with-locales.min.js" integrity="sha256-wzBMoYcU9BZfRm6cQLFii4K5tkNptkER9p93W/vyCqo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
@endpush