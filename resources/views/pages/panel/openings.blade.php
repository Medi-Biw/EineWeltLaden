@extends('layouts.app.sidebar')

@section('sub', 'Öffnungszeiten bearbeiten - ')

@section('main')
	<div id="page-content">
		<h1>Öffnungszeiten bearbeiten <a href="{{ url('/laden/öffnungszeiten') }}" class="btn btn-primary" style="float: right">Ansehen</a></h1>
		<form action="{{ action('OpeningsController@update') }}" method="POST"
			  class="card table-responsive" id="openings-card">
			@csrf
			@method('PUT')
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
					'sun' => 'Sonntag',
				]
				?>
				@foreach($days as $day => $name)
					<tr>
						<td rowspan="2" style="width: 160px">
							<strong>{{ $name }}</strong>
							<div class="custom-control custom-checkbox">
								<input type="hidden" name="days[{{ $day }}][closed]" value="0" />
								<input type="checkbox" class="custom-control-input" id="closed_{{ $day }}"
									   name="days[{{ $day }}][closed]" value="1"
										{{ $data[$day]['closed'] ? 'checked' : '' }} />
								<label class="custom-control-label" for="closed_{{ $day }}">Geschlossen</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="hidden" name="days[{{ $day }}][two_times]" value="0" />
								<input type="checkbox" class="custom-control-input" id="twin_{{ $day }}"
									   name="days[{{ $day }}][two_times]" value="1"
										{{ $data[$day]['two_times'] ? 'checked' : '' }} />
								<label class="custom-control-label" for="twin_{{ $day }}">Zwei Zeiten</label>
							</div>
						</td>
						<td class="text-center">
							<input class="form-control text-center timep" id="{{ $day }}_from_1"
								   data-target="#{{ $day }}_from_1" data-toggle="datetimepicker"
								   value="{{ $data[$day]['from_1'] }}" name="days[{{ $day }}][from_1]"
								   title="1. Zeit - {{ $name }} - öffnet" readonly>
						</td>
						<td class="text-center">
							<input class="form-control text-center timep" id="{{ $day }}_till_1"
								   data-target="#{{ $day }}_till_1" data-toggle="datetimepicker"
								   value="{{ $data[$day]['till_1'] }}" name="days[{{ $day }}][till_1]"
								   title="1. Zeit - {{ $name }} - schließt" readonly>
						</td>
						<td></td>
						<td class="text-center">
							<input class="form-control text-center timep" id="{{ $day }}_from_2"
								   data-target="#{{ $day }}_from_2" data-toggle="datetimepicker"
								   value="{{ $data[$day]['from_2'] }}" name="days[{{ $day }}][from_2]"
								   title="2. Zeit - {{ $name }} - öffnet" readonly>
						</td>
						<td class="text-center">
							<input class="form-control text-center timep" id="{{ $day }}_till_2"
								   data-target="#{{ $day }}_till_2" data-toggle="datetimepicker"
								   value="{{ $data[$day]['till_2'] }}" name="days[{{ $day }}][till_2]"
								   title="2. Zeit - {{ $name }} - schließt" readonly>
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<input value="{{ $data[$day]['text'] }}" class="form-control"
								   style="min-width: 500px" title="Diesem Tag Text hinzufügen"
								   name="days[{{ $day }}][text]" placeholder="Zusatztext" />
							<div class="custom-control custom-checkbox" style="margin-top: 0.5rem">
								<input type="hidden" name="days[{{ $day }}][override]" value="0" />
								<input type="checkbox" class="custom-control-input" id="replace_{{ $day }}"
									   name="days[{{ $day }}][override]" value="1"
										{{ $data[$day]['override'] ? 'checked' : '' }} />
								<label class="custom-control-label" for="replace_{{ $day }}">
									Zusatz ersetzt Zeiten
								</label>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<div class="card-footer text-right" id="openings-save-bar">
				<button type="submit" class="btn btn-primary btn-sm">Änderungen Speichern</button>
			</div>
		</form>
	</div>
	<script>
		$(function(){
			let timep = $('.timep');
			timep.datetimepicker({
				locale: 'de',
				format: 'H:mm',
				ignoreReadonly: true,
				widgetPositioning: {
					horizontal: 'right'
				}
			});
			$('body').on('mousedown', function (event) {
				if ($(event.target).closest('.bootstrap-datetimepicker-widget').length) return;
				timep.datetimepicker('hide');
			});
		});
	</script>
@endsection
@push('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/css/tempusdominus-bootstrap-4.min.css" />
@endpush
@push('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha18/js/tempusdominus-bootstrap-4.min.js"></script>
@endpush