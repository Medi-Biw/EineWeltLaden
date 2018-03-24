@extends('layouts.app.sidebar')

@section('page_title', 'Sortiment - ')
@section('sub', 'Laden - ')

@section('main')
	<div id="page-content">
		<h1>Eine-Welt-Laden</h1>
		<section class="wide-image-section">
			<img src="{{ asset('storage/laden_innen.jpg') }}">
			<span class="img-credit">Unser Laden in Bischofswerda &mdash; Innenansicht</span>
		</section>
		<section class="text-section">
			<h3>Das haben wir im Angebot</h3>
			<p>
				Wir bieten hochwertige Öko-faire Lebensmittel und Handwerksprodukte aus aller Welt an, besonders von Kleinproduzenten.
			</p>
			<h5>Lebens- und Genussmittel:</h5>
			<ul>
				<li>Kaffee &amp; Tee</li>
				<li>Gewürze</li>
				<li>Reis &amp; Bohnen</li>
				<li>Schokolade u.a. Süßigkeiten</li>
				<li>Säfte &amp; Weine</li>
			</ul>
		</section>
		<section class="wide-image-section">
			<img src="{{ asset('storage/handwerksartikel.jpg') }}">
			<span class="img-credit">Eine kleine Auswahl dekorativer Handwerksobjekte aus unserem Laden</span>
		</section>
		<section class="text-section">
			<h5>Handwerksartikel:</h5>
			<ul>
				<li>Taschen &amp; Körbe</li>
				<li>Tücher &amp; Schmuck</li>
				<li>Spielzeuge</li>
				<li>Dekoartikel</li>
				<li>Kerzen &amp; Räucherwaren</li>
			</ul>
			<p>
				Individuelle Bestellungen sind (mit entsprechender Wartezeit) jederzeit möglich.
			</p>
		</section>
		<section class="text-section">
			<h3>Woher bezieht der Weltladen Bischofswerda seine Waren?</h3>
			<p>
				Aus kontrolliert fairem Handel von geprüften Importeuren wie <a href="https://www.gepa.de/" target="_blank">GEPA</a>, <a href="https://www.el-puente.de/" target="_blank">El&nbsp;Puente</a>, <a href="http://www.dwpeg.de/" target="_blank">dwp-Weltpartner</a> u.a. Die Siegel der Importeure bürgen für die Einhaltung der Fairer-Handel-Kriterien. Die Lieferungen bündelt unsere Einkaufsgenossenschaft <a href="http://faire.de/" target="_blank">F.A.I.R.E. Warenhandels&nbsp;eG</a> in Dresden.
			</p>
			<p>
				Zudem vertreiben wir Erzeugnisse lokaler Produzenten wie Apfelsaft und Kartoffeln der <a href="http://franziskusgemeinschaft-leutwitz.de/" target="_blank">Franziskusgemeinschaft Leutwitz</a> und Honig der <a href="http://imkereilohse.de/" target="_blank">Imkerei Lohse</a> aus Putzkau.
			</p>
		</section>
	</div>
@endsection