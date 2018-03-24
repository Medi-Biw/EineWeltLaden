@extends('layouts.app.sidebar')

@section('page_title', 'Veranstaltungen - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>
			Veranstaltungen
			@auth
				@if(auth()->user()->perm_events)
					<a class="btn btn-outline-primary float-right" href="{{ route('events.create') }}">Neue
						Veranstaltung</a>
				@endif
			@endauth
		</h1>
		@foreach($events as $event)
			<section class="event-section card">
				<div class="card-body">
					@if($event->date)
						<?php
							$date = $event->date;
							$dates = explode('/', $date);

							if (count($dates) == 2) {
								$t1 = strtotime($dates[0]);
								$t2 = strtotime($dates[1]);

								if ($dates[0] == $dates[1])
									$date = date('d.m.Y', $t1);
								else if (
									date('j', $t1) === '1' &&
									date('m-Y', $t1) == date('m-Y', $t2) &&
									date('t', $t2) === date('d', $t2)
								) {
									$monate = [
										1 => "Januar", 2 => "Februar", 3 => "März", 4 => "April",
										5 => "Mai", 6 => "Juni", 7 => "Juli", 8 => "August",
										9 => "September", 10 => "Oktober", 11 => "November", 12 => "Dezember"
									];
									$date = $monate[date('n', $t1)] . ' ' . date('Y', $t1);
								}
								else if (
									date('j-m', $t1) === '1-01' &&
									date('d-m', $t2) === '31-12' &&
									date('Y', $t1) == date('Y', $t2)
								) {
									$date = date('Y', $t1);
								}
								else {
									$date = date('d.m.Y', $t1) . ' bis ' . date('d.m.Y', $t2);
								}
							}
						?>
						<h6 class="card-subtitle mb-2 text-muted">{{ $date }}</h6>
					@endif
					<h3 class="card-title">{{ $event->title }}</h3>
					@if($event->image)
						<div style="text-align: center; margin: 0.5rem 0 1.5rem">
							<img src="data:image/jpeg;base64,{{ $event->image }}" class="img-fluid" style="max-height: 500px">
						</div>
					@endif
					@if($event->body)
						<div class="card-text">
							{!! $event->body !!}
						</div>
					@endif
					<div class="event-links" style="margin-top: 1.5rem;">
						@if($event->more_link)
							<a href="{{ $event->more_link }}" class="card-link" target="_blank">Weitere Informationen</a>
						@endif
						@auth
							@if(auth()->user()->perm_events)
								<a href="{{ route('events.edit', $event->id) }}" class="card-link">Bearbeiten</a>
								<a href="{{ route('events.destroy', $event->id) }}" class="card-link"
								   onclick="deleteEvent(event, {{ $event->id }}); return false;"
								>Löschen</a>
							@endif
						@endauth
					</div>
				</div>
			</section>
		@endforeach
		<section>
			{{ $events->links() }}
		</section>
	</div>
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
	<script>
		function deleteEvent(e, id) {
			e.preventDefault();
			alertify
				.cancelBtn("Abbrechen")
				.confirm('Löschen bestätigen', function () {
					$.ajax({
						url: '{{ route('events.index') }}/' + id,
						type: 'DELETE',
						success: function (result) {
							result = $.parseJSON(result);
							if (result.success === true)
								window.location.reload();
							else deleteError();
						},
						error: function() { deleteError() }
					});
				});
		}
		function deleteError() {
			alertify.alert('<strong>Fehler beim Löschen der Veranstaltung.</strong><br>Versuchen Sie es später nochmal.')
		}
	</script>
@endsection