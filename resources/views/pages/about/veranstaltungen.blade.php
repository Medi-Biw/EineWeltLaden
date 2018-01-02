@extends('layouts.app.sidebar')

@section('page_title', 'Veranstaltungen - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>Veranstaltungen</h1>
		<hr>
		<section class="event-section">
			<h3>Lesung mit Autor Anant Kumar, 2015</h3>
			<img src="/storage/LesungMitAnantKumar2015_crop.jpg" class="img-fluid">
			<p class="caption">
				Der deutsche Schriftsteller mit indischen Wurzeln setzt sich mit Erfahrungen in der Fremde auseinander.
			</p>
		</section>
		<hr>
		<section class="event-section">
			<strong>@{{ HIER FEHLEN INHALTE }}</strong>
		</section>
		<section></section>
	</div>
@endsection