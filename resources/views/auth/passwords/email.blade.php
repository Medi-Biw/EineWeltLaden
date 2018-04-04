@extends('layouts.app.sidebar')

@section('main')
	<div id="page-content">
		<div class="row">
			<h1 class="col-md-6 offset-md-3">Passwort Zurücksetzen</h1>
		</div>
		<form method="POST" action="{{ route('password.email') }}">
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
				<div class="form-group col-md-6 offset-md-3">
					<button type="submit" class="btn btn-primary">Passwort-Reset-Link zuschicken</button>
				</div>
			</div>
		</form>
	</div>
@endsection
