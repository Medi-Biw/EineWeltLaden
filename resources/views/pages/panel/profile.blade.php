@extends('layouts.app.sidebar')
@section('main')
	<div id="page-content">
		<section class="text-section">
			<h1><strong>Mein Profil</strong></h1>
			<form action="{{ action('ProfileController@update') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="name">Anzeigename</label>
					<input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
						   class="form-control{{ $errors->profile->has('name') ? ' is-invalid' : '' }}" />
					@if($errors->profile->has('name'))
						<div class="invalid-feedback">
							{{ $errors->profile->first('name') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="email">Email-Adresse</label>
					<input type="text" id="email" name="email" value="{{ auth()->user()->email }}"
						   class="form-control{{ $errors->profile->has('email') ? ' is-invalid' : '' }}" />
					@if($errors->profile->has('email'))
						<div class="invalid-feedback">
							{{ $errors->profile->first('email') }}
						</div>
					@endif
					<small class="form-text text-muted">
						Die Email ist der Anmeldename und muss gültig sein.
					</small>
				</div>
				<div class="form-group text-right">
					<button class="btn btn-primary btn-sm">Profil aktualisieren</button>
				</div>
			</form>
			<form action="{{ action('ProfileController@password') }}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="password_old">Aktuelles Passwort</label>
					<input type="password" id="password_old" name="password_old" autocomplete="current-password" value=""
						   class="form-control{{ $errors->password->has('password_old') ? ' is-invalid' : '' }}" />
					@if($errors->password->has('password_old'))
						<div class="invalid-feedback">
							{{ $errors->password->first('password_old') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="password">Neues Passwort</label>
					<input type="password" id="password" name="password" autocomplete="new-password" value="" minlength="6"
						   class="form-control{{ $errors->password->has('password') ? ' is-invalid' : '' }}" />
					@if($errors->password->has('password'))
						<div class="invalid-feedback">
							{{ $errors->password->first('password') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label for="password_confirmation">Neues Passwort wiederholen</label>
					<input type="password" id="password_confirmation" name="password_confirmation"
						   autocomplete="new-password" value="" minlength="6"
						   class="form-control{{ $errors->password->has('password_confirmation') ? ' is-invalid' : '' }}" />
					@if($errors->password->has('password_confirmation'))
						<div class="invalid-feedback">
							{{ $errors->password->first('password_confirmation') }}
						</div>
					@endif
				</div>
				<div class="form-group text-right">
					<button class="btn btn-primary btn-sm">Passwort aktualisieren</button>
				</div>
			</form>
		</section>
	</div>
@endsection
