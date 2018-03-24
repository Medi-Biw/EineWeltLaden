@extends('layouts.app.sidebar')

@section('page_title', 'Mitarbeiter - ')
@section('sub', 'Laden - ')

@section('main')
	<div id="page-content">
		<h1>Eine-Welt-Laden</h1>
		<section class="wide-image-section">
			<img src="/storage/platzhalter/mitarbeiter.jpg">
		</section>
		<section class="text-section">
			<h2>Mitarbeiter</h2>
			<p>
				Der Verein zählt 17 Mitglieder und zusätzlich 4 ehrenamtliche Ladendienste.
			</p>
		</section>
		<section class="text-section">
			<strong>@{{ HIER FEHLEN INHALTE }}</strong>
		</section>
	</div>
@endsection