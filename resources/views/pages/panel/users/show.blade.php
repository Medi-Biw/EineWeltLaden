@extends('layouts.app.sidebar')

@section('sub', 'Benutzer: ' . $user->name . ' - ')

@section('main')
	<?php

	function janein($check)
	{
		if ($check)
			return 'ja';
		return 'nein';
	}

	?>
	<div id="page-content">
		<h1>Benutzerkonto ({{ $user->id }})</h1>
		<div class="card">
			<div class="card-body table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th class="cell-narrow text-right">Name</th>
						<td>{{ $user->name }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">Email</th>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">erstellt</th>
						<td>{{ $user->created_at }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">letzte Änderung</th>
						<td>{{ $user->updated_at }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">darf Beiträge verwalten</th>
						<td>{{ janein($user->perm_posts) }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">darf Veranstaltungen verwalten</th>
						<td>{{ janein($user->perm_events) }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">darf Benutzer verwalten</th>
						<td>{{ janein($user->perm_users) }}</td>
					</tr>
					<tr>
						<th class="cell-narrow text-right">darf Öffnungszeiten bearbeiten</th>
						<td>{{ janein($user->perm_openings) }}</td>
					</tr>
				</table>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col">
						<a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary">Zurück zum Index</a>
						<a href="{{ route('user.create') }}" class="btn btn-sm btn-secondary">Neuen Benutzer anlegen</a>
					</div>
					<div class="col text-right">
						@if($user->id !== auth()->id())
							<a href="#" onclick="delUser(event, '{{ route('user.destroy', $user->id) }}');"
							   class="btn btn-sm btn-danger">
								<i class="fa fa-trash"></i>
								Löschen
							</a>
						@endif
						<a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">
							<i class="fa fa-pencil-alt"></i>
							Bearbeiten
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
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
								window.location = '{{ route('user.index') }}';
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