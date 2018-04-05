@extends('layouts.app.sidebar')

@section('sub', 'Bearbeiten: ' . $user->name . ' - ')

@section('main')
	<div id="page-content">
		<section class="text-section">
			<h1>
				<a href="{{ route('user.index') }}" style="float: right"
				   class="btn btn-outline-primary">Zurück zum Index</a>
				Benutzerkonto<br>aktualisieren
				<a href="{{ route('user.show', $user->id) }}" style="float: right"
				   class="btn btn-outline-primary btn-sm">Benutzer Ansehen</a>
			</h1>
			<form action="{{ action('UserController@update', $user->id) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="name">Name</label>
					<input id="name" name="name" value="{{ old('name') ?? $user->name }}" required
						   class="form-control{{ $errors->cruser->has('name') ? ' is-invalid' : '' }}"/>
					@if($errors->cruser->has('name'))
						<div class="invalid-feedback">
							{{ $errors->cruser->first('name') }}
						</div>
					@endif
					<small class="form-text text-muted">Wird in Beiträgen öffentlich angezeigt.</small>
				</div>
				<div class="form-group">
					<label for="email">Email-Adresse</label>
					<input id="email" name="email" type="email" value="{{ old('email') ?? $user->email }}" required
						   class="form-control{{ $errors->cruser->has('email') ? ' is-invalid' : '' }}"/>
					@if($errors->cruser->has('email'))
						<div class="invalid-feedback">
							{{ $errors->cruser->first('email') }}
						</div>
					@endif
					<small class="form-text text-muted">
						Das ist der Anmeldename.
						Eine Email-Adresse kann nur für einen Nutzer verwendet werden.
					</small>
				</div>
				<div class="form-group">
					<label for="password">Neues Passwort</label>
					<input id="password" name="password" type="password"
					class="form-control{{ $errors->cruser->has('password') ? ' is-invalid' : '' }}"/>
					@if($errors->cruser->has('password'))
						<div class="invalid-feedback">
							{{ $errors->cruser->first('password') }}
						</div>
					@endif
					<small class="form-text text-muted">
						Mindestens 6 Zeichen.
						<br>Freilassen, um keine Änderung vorzunehmen.
					</small>
				</div>
				<div class="form-group">
					<label for="password_confirmation">Neues Passwort wiederholen</label>
					<input id="password_confirmation" name="password_confirmation" type="password"
					class="form-control"/>
				</div>
				<div class="form-group">
					<label>
						<input type="hidden" name="perm_posts" value="0">
						<input type="checkbox" name="perm_posts"
							   value="1"{{ (old('perm_posts') ?? $user->perm_posts) ? ' checked' : '' }}>
						Beiträge verwalten
					</label><br>
					<label>
						<input type="hidden" name="perm_events" value="0">
						<input type="checkbox" name="perm_events"
							   value="1"{{ (old('perm_events') ?? $user->perm_events) ? ' checked' : '' }}>
						Veranstaltungen verwalten
					</label><br>
					<label>
						<input type="hidden" name="perm_users" value="0">
						<input type="checkbox" name="perm_users"
							   value="1"{{ (old('perm_users') ?? $user->perm_users) ? ' checked' : '' }}>
						Benutzer verwalten
					</label><br>
					<label>
						<input type="hidden" name="perm_openings" value="0">
						<input type="checkbox" name="perm_openings"
							   value="1"{{ (old('perm_openings') ?? $user->perm_openings) ? ' checked' : '' }}>
						Öffnungszeiten bearbeiten
					</label><br>
				</div>
				<div class="form-group py-3">
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-outline-danger btn-sm" onclick="delUser(event, '{{ action('UserController@destroy', $user->id) }}');">Löschen</button>
						</div>
						<div class="col text-right">
							<button type="submit" class="btn btn-primary">Änderungen speichern</button>
						</div>
					</div>
				</div>
			</form>
		</section>
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