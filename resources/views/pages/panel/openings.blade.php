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
								<input type="checkbox" class="custom-control-input" id="check_{{ $day }}">
								<label class="custom-control-label" for="check_{{ $day }}">Geschlossen</label>
							</div>
						</td>
						<td class="text-center"><input class="form-control text-center timep" value="{{ $data[$day]['from_1'] }}" name="{{ $day }}[from_1]"></td>
						<td class="text-center"><input class="form-control text-center timep" value="{{ $data[$day]['till_1'] }}" name="{{ $day }}[till_1]"></td>
						<td></td>
						<td class="text-center"><input class="form-control text-center timep" value="{{ $data[$day]['from_2'] }}" name="{{ $day }}[from_2]"></td>
						<td class="text-center"><input class="form-control text-center timep" value="{{ $data[$day]['till_2'] }}" name="{{ $day }}[till_2]"></td>
					</tr>
					<tr>
						<td colspan="5">
							<input value="{{ $data[$day]['text'] }}" class="form-control"/>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="check_{{ $day }}">
								<label class="custom-control-label" for="check_{{ $day }}">Zusatz ersetzt Zeiten</label>
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
			$('.timep').mdtimepicker({
				format: 'hh:mm',
				timeFormat: 'hh:mm:ss.000',
				theme: 'green',
				readOnly: true
			});
		});
	</script>
@endsection
@push('styles')
	<link rel="stylesheet" href="https://cdn.rawgit.com/dmuy/MDTimePicker/master/mdtimepicker.css">
@endpush
@push('scripts')
	<script src="{{ asset('js/mdtimepicker.js') }}"></script>
@endpush