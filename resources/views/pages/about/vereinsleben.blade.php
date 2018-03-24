@extends('layouts.app.sidebar')

@section('page_title', 'Vereinsleben - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>Wir über uns</h1>
		<section class="wide-image-section">
			<img src="https://dummyimage.com/866x450/3a450f/66842f.jpg&text=Platzhalter">
		</section>
		<section class="text-section">
			<h2>Vereinsleben</h2>
			<p>
				Hauptinhalt ist das ehrenamtliche Betreiben eines Ladens, in dem fair gehandelte Produkte vertrieben werden (s. auch <a href="{{ route('laden', ['sub' => 'sortiment']) }}" title="zur Sortiment-Seite">Sortiment</a>).
			</p>
			<p>
				Zusätzlich organisieren wir Außenverkäufe zu verschiedenen Anlässen (beispielsweise zur jährlichen &#132;Nacht der Offenen Tür&#147; am Goethe-Gymnasium Bischofswerda, am Weltgebetstag, zu den Schiebocker Tagen, für Gemeindefeste u.v.a.m.). An nationalen Aktionen (z.B. am Weltladentag, Faire Woche, Sachsen kauft fair) beteiligen wir uns im Rahmen unserer Möglichkeiten.
			</p>
			<p style="margin-bottom: 0">
				Unser Verein trifft sich monatlich, um alle Vorhaben zu besprechen, Pläne zu machen und Neues über Fairen Handel, Hersteller und Produkte zu erfahren. Wir beraten über die Teilnahme an Festen, Weiterbildungen und entwicklungspolitischen Aktionen und arbeiten mit verschiedenen Kooperationspartnern zusammen, z.B. mit dem Eiscafé Kunath in Großharthau.
			</p>
			<p class="text-center">
				<img src="{{ asset('storage/eiscafe_kunath_grossharthau.jpg') }}" style="max-width: 260px; margin-top: 1rem">
				<br><span class="img-credit">Bestes Eis aus dem Eiscafé Kunath in Großharthau</span>
			</p>
			<p>
				Die Teilnahme an überregionalen Veranstaltungen und Bildungsmaßnahmen wird vom Verein unterstützt. Außerdem organisieren wir öffentliche Veranstaltungen, z.B. Vorträge, Konzerte, Ausstellungen. Für Bildungsarbeit übernehmen wir die Vermittlung von Referenten
			</p>
		</section>
	</div>
@endsection