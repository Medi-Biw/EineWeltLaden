@extends('layouts.app.sidebar')

@section('main')
	<div id="page-content">
		<div class="row">
			<h1 class="col-md-6 offset-md-3">Anmelden</h1>
		</div>
		<form method="POST" action="{{ route('login') }}">
			{{ csrf_field() }}

			<div class="row">
				<div class="form-group col-md-6 offset-md-3{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email">Email</label>

					<input id="email" type="email" class="form-control" name="email"
						   value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
						<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6 offset-md-3{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password">Passwort</label>
					<input id="password" type="password" class="form-control" name="password"
						   required>
					@if ($errors->has('password'))
						<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6 offset-md-3">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
							&nbsp;Angemeldet bleiben
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6 offset-md-3">
					<button type="submit" class="btn btn-primary">Anmelden</button>
					<a class="btn btn-link" href="{{ route('password.request') }}">Passwort vergessen?</a>
				</div>
			</div>
		</form>
	</div>
@endsection
