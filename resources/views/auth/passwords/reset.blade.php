@extends('layouts.app.sidebar')

@section('main')
	<div id="page-content">
		<div class="row">
			<h1 class="col-md-6 offset-md-3">Passwort Zurücksetzen</h1>
		</div>
		<form method="POST" action="{{ route('password.request') }}">
			{{ csrf_field() }}

			<input type="hidden" name="token" value="{{ $token }}">

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
						   value="{{ old('password') }}" required>

					@if ($errors->has('password'))
						<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6 offset-md-3{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<label for="password-confirm">Passwort</label>

					<input id="password-confirm" type="password" class="form-control" name="password_confirmation"
						   required>

					@if ($errors->has('password_confirmation'))
						<span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6 offset-md-3">
					<button type="submit" class="btn btn-primary">Passwort zurücksetzen</button>
				</div>
			</div>
		</form>
	</div>
@endsection
