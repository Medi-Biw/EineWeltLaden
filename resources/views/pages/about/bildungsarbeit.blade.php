@extends('layouts.app.sidebar')

@section('page_title', 'Bildungsarbeit - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>Wir über uns</h1>
		<section class="wide-image-section">
			<img src="/storage/platzhalter/bildungsarbeit.jpg">
		</section>
		<section class="text-section">
			<h2>Bildungsarbeit</h2>
			<p>
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
			</p>
			<p>
				At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
			</p>
			<p>
				Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
			</p>
		</section>
		<section class="text-section">
			<strong>@{{ HIER FEHLEN INHALTE }}</strong>
		</section>
	</div>
@endsection