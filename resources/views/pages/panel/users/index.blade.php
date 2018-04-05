@extends('layouts.app.sidebar')

@section('sub', 'Benutzerübersicht - ')

@section('main')
	<div id="page-content">
		<h1>
			Benutzer
			<a href="{{ route('user.create') }}" class="btn btn-primary" style="float: right">Neu erstellen</a>
		</h1>
		@foreach($users as $user)
			<div class="card mb-3">
				<div class="anchor" id="!/{{ $user->id }}"></div>
				<div class="card-body">
					<h5 class="card-title"><strong>{{ $user->name }}</strong></h5>
					<p class="card-text">{{ $user->email }}</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<a href="{{ route('user.show', $user->id) }}" class="card-link">Anzeigen</a>
						<a href="{{ route('user.edit', $user->id) }}" class="card-link">Bearbeiten</a>
						@if($user->id !== auth()->id())
							<a href="#" onclick="delUser(event, '{{ route('user.destroy', $user->id) }}');"
							   class="card-link">Löschen</a>
						@endif
					</li>
				</ul>
			</div>
		@endforeach
	</div>
	<div style="height: 10vh"></div>
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
	<script>
		function delUser(e, url) {
			e.preventDefault();
			alertify
				.cancelBtn("Abbrechen")
				.confirm('Löschen bestätigen', function () {
					$.ajax({
						url: url,
						type: 'DELETE',
						success: function (result) {
							if (result.success === true)
								window.location.reload();
							else deleteError();
						},
						error: function () {
							deleteError()
						}
					});
				});
		}

		function deleteError() {
			alertify.alert('<strong>Fehler beim Löschen des Benutzers.</strong><br>Versuchen Sie es später nochmal.')
		}
	</script>
@endsection