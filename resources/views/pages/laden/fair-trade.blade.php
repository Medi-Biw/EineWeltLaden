@extends('layouts.app.sidebar')

@section('page_title', 'Fairer Handel - ')
@section('sub', 'Laden - ')

@section('main')
	<div id="page-content">
		<h1>Eine-Welt-Laden</h1>
		<section class="wide-image-section">
			<img src="/storage/fair-trade.jpg">
		</section>
		<section class="text-section">
			<h3>Was ist Fairer Handel?</h3>
			<p>
				Anfang der 1970er Jahre ist aus der Kritik an ungerechten Welthandelsstrukturen die "Aktion Dritte-Welt-Handel" entstanden. Die heute ca. 800 deutschen Weltläden verstehen sich als Teil dieser Bewegung.
			</p>
			<p>
				<em>Es wurden folgende Kriterien für den Fairen Handel festgelegt:</em>
			</p>
			<ul>
				<li>Sozial- und Umweltverträglichkeit</li>
				<li>umfassende Transparenz der Strukturen</li>
				<li>Mitbestimmung in den Fair-Handels-Organisationen</li>
				<li>Non-Profit</li>
				<li>Informations- und Bildungsarbeit</li>
				<li>Kontinuität der Handelsbeziehungen</li>
			</ul>
			<p>
				<a href="/storage/konvention-der-weltlaeden_neue-fassung_2015-06-21.pdf" target="_blank" style="font-size: 1.2rem">
					<i class="far fa-link"></i> PDF-Datei: Konvention der Weltläden
				</a>
			</p>
		</section>
	</div>
@endsection