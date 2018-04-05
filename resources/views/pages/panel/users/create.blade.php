@extends('layouts.app.sidebar')

@section('sub', 'Benutzer erstellen - ')

@section('main')
	<div id="page-content">
		<section class="text-section">
			<h1>
				Benutzer erstellen
				<a href="{{ route('user.index') }}" style="float: right"
				   class="btn btn-outline-secondary">Zurück zum Index</a>
			</h1>
			<form action="{{ action('UserController@store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input id="name" name="name" value="{{ old('name') }}" required autofocus
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
					<input id="email" name="email" type="email" value="{{ old('email') }}" required
						   class="form-control{{ $errors->cruser->has('email') ? ' is-invalid' : '' }}"/>
					@if($errors->cruser->has('email'))
						<div class="invalid-feedback">
							{{ $errors->cruser->first('email') }}
						</div>
					@endif
					<small class="form-text text-muted">Das ist der Anmeldename. Eine Email-Adresse kann nur für einen Nutzer verwendet werden.</small>
				</div>
				<div class="form-group">
					<label for="password">Passwort</label>
					<input id="password" name="password" type="password" autocomplete="new-password" required minlength="6"
						   class="form-control{{ $errors->cruser->has('password') ? ' is-invalid' : '' }}"/>
					@if($errors->cruser->has('password'))
						<div class="invalid-feedback">
							{{ $errors->cruser->first('password') }}
						</div>
					@endif
					<small class="form-text text-muted">Mindestens 6 Zeichen.</small>
				</div>
				<div class="form-group">
					<label for="password_confirmation">Passwort wiederholen</label>
					<input id="password_confirmation" name="password_confirmation" type="password"
						   autocomplete="new-password" required minlength="6" class="form-control"/>
				</div>
				<div class="form-group">
					<label>
						<input type="checkbox" name="perm_posts" value="1"{{ old('perm_posts') ? ' checked' : '' }}>
						Beiträge verwalten
					</label><br>
					<label>
						<input type="checkbox" name="perm_events" value="1"{{ old('perm_events') ? ' checked' : '' }}>
						Veranstaltungen verwalten
					</label><br>
					<label>
						<input type="checkbox" name="perm_users" value="1"{{ old('perm_users') ? ' checked' : '' }}>
						Benutzer verwalten
					</label><br>
					<label>
						<input type="checkbox" name="perm_openings" value="1"{{ old('perm_openings') ? ' checked' : '' }}>
						Öffnungszeiten bearbeiten
					</label><br>
				</div>
				<div class="form-group text-right py-3">
					<button type="submit" class="btn btn-primary">Benutzer anlegen</button>
				</div>
			</form>
		</section>
	</div>
@endsection