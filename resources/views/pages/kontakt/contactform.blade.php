@extends('layouts.app.sidebar')

@section('sub', 'Schreiben Sie uns - ')

@section('main')
	<div id="page-content">
		<h1>Kontaktformular</h1>
		<section class="wide-image-section">
			<img src="/storage/platzhalter/kontaktformular.jpg">
		</section>
		<section class="text-section">
			<form action="{{ action('EmailController@contact') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="name">Vor- und Nachname</label>
					<input id="name" class="form-control{{ $errors->contact->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"/>
					<div class="invalid-feedback">
						{{ $errors->contact->first('name') }}
					</div>
				</div>
				<div class="form-group">
					<label for="email">Ihre Email-Adresse</label>
					<input id="email" class="form-control{{ $errors->contact->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"/>
					<div class="invalid-feedback">
						{{ $errors->contact->first('email') }}
					</div>
				</div>
				<div class="form-group">
					<label for="subject">Betreff</label>
					<input id="subject" class="form-control{{ $errors->contact->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}"/>
					<div class="invalid-feedback">
						{{ $errors->contact->first('subject') }}
					</div>
				</div>
				<div class="form-group">
					<label for="message">Ihre Mitteilung</label>
					<textarea id="message" class="form-control{{ $errors->contact->has('message') ? ' is-invalid' : '' }}" name="message" rows="7" style="min-height: 150px;">{{ old('message') }}</textarea>
					<div class="invalid-feedback">
						{{ $errors->contact->first('message') }}
					</div>
				</div>
				<div class="form-group text-right">
					<div class="row">
						<div class="col-sm-8 offset-sm-4">
							<small class="form-text text-muted">Mit Absenden des Kontaktformulares erklären Sie sich mit unserer <a href="{{ route('kontakt', ['sub' => 'datenschutz']) }}" target="_blank">Datenschutzerklärung</a> einverstanden.</small>
						</div>
					</div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Anfrage Übermitteln</button>
				</div>
			</form>
		</section>
	</div>
@endsection