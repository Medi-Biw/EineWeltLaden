@extends('layouts.app.sidebar')

@section('page_title', 'Initiative ergreifen - ')
@section('sub', 'Über uns - ')

@section('main')
	<div id="page-content">
		<h1>Wir über uns</h1>
		<section class="wide-image-section">
			<img src="{{ asset('storage/mitmachen.jpg') }}">
		</section>
		<section class="text-section">
			<h2><em>Weltoffen</em> &mdash; durch &mdash; <em>Weltladen</em></h2>
			<p>
				Schon seit 1990 stellen wir in Bischofswerda und Umgebung immer wieder Neues auf die Beine! Wir engagieren uns für Fairen Handel mit menschenwürdig erzeugten Produkten und öffnen unser Geschäft gern und regelmäßig für jeden, der eine Einkaufsalternative sucht. Unser buntes Sortiment stammt aus aller Welt, unser ehrenamtliches Team aus der schönen Oberlausitz.
			</p>
			<h2>Was kann ich tun?</h2>
			<p>
				Ständig suchen wir Mitstreiter für den Verkauf oder als &#132;Springer&#147;, um für freundliche Öffnungszeiten zu sorgen und an Außenverkäufen und Aktionen teilzunehmen.
			</p>
			<p>
				Zur Organisation von Veranstaltungen und Bildungsarbeit, zur Betreuung der Internet-Seite, zum bewerben politischer Forderungen und für weitere interessante Tätigkeiten &mdash; natürlich auch um gemeinsam Spaß zu haben &mdash; begrüßen wir liebend gern neue Mitglieder im Verein.
			</p>
			<p>
				<strong><a href="{{ route('kontakt', ['sub' => 'info']) }}">Sprechen sie uns jederzeit an.</a></strong>
			</p>
			<p>
				Als Verbraucher können Sie andererseits mit dem Einkaufskorb etwas gegen Mangelernährung, Armut und Ungerechtigkeit im Welthandel tun und leisten außerdem einen Beitrag zum Umweltschutz.
			</p>
			<p>
				Sie erkennen Fair-Trade-Produkte an den Siegeln von <strong>Fairtrade</strong>, <strong>GEPA</strong>, <strong>Hand in Hand </strong>und natürlich finden Sie Fair-Trade in den rund 800 Weltläden in Deutschland &mdash; so, wie dem unseren.
			</p>
			<p>
				Zu beachten gibt es weiterhin insbesondere das Bio-Siegel, denn dieses zertifiziert lediglich ökologischen Anbau, mit Fairness hat es nichts zu tun.
			</p>
		</section>
	</div>
@endsection