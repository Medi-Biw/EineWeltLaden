@extends('layouts.app.sidebar')

@section('page_title', 'Öffnungszeiten - ')
@section('sub', 'Laden - ')

@section('main')
	<div id="page-content">
		<h1>Eine-Welt-Laden</h1>
		<section>
			<h2>Öffnungszeiten</h2>
			@php
				$op = \App\Openings::all();
				$days = [
					'mon' => 'Montag',
					'tue' => 'Dienstag',
					'wed' => 'Mittwoch',
					'thu' => 'Donnerstag',
					'fri' => 'Freitag',
					'sat' => 'Samstag',
					'sun' => 'Sonntag',
				];
			@endphp
			<div class="oez-wrapper">
				<div class="card oez-card">
					<div class="card-body table-responsive">
						<table class="oez-tabelle">
							@foreach($op as $day)
								@php
									$name = $days[$day->id];
								@endphp
								<tr>
									<th{{ (!$day->closed && !$day->override && $day->text) ? ' rowspan=2' : ''}}>{{ $name }}</th>
									@if($day->closed)
										<td colspan="7"><em>geschlossen</em></td>
									@elseif($day->override)
										<td colspan="7" class="font-style-normal">{{ $day->text }}</td>
									@else
										<td>{{ $day->from_1 }}</td>
										<td>&mdash;</td>
										<td>{{ $day->till_1 }}</td>
										@if($day->two_times)
											<td class="px-3"><em>und</em></td>
											<td>{{ $day->from_2 }}</td>
											<td class="px-1">&mdash;</td>
											<td>{{ $day->till_2 }}</td>
										@else
											<td></td><td></td><td></td><td></td>
										@endif
									@endif
								</tr>
								@if (!$day->closed && !$day->override && $day->text)
									<tr>
										<td colspan="7" class="text-left text text-secondary small">{{ $day->text }}</td>
									</tr>
								@endif
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection