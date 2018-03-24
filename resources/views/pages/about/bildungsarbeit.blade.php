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
				Informations- und Bildungsarbeit gehört zu den Kriterien des Fairen Handels, denen sich auch der Bischofswerdaer Weltladen-Verein verpflichtet hat. Bildung beginnt mit der Produktinformation im Laden und beim Kundengespräch, zeigt sich im Schaufenster und umfasst Vorträge und Veranstaltungen für alle Altersgruppen.
			</p>
			<p>
				Das können Länderberichte, Lesungen, Verkostungen oder Mitmach-Aktionen wie faires Kochen sein. Zusammen mit Bildungsreferenten des Sächsischen Entwicklungspolitischen Netzwerks (ENS) bieten wir verschiedenste Themen rund um den Fairen Handel an.
			</p>
			<p>
				<strong>Kontakieren Sie uns! Gerne vermitteln wir Ihnen Referenten.</strong>
			</p>
			<p class="text-center">
				<a href="{{ route('kontakt', ['sub' => 'info']) }}" class="btn btn-outline-primary btn-rounded btn-fa-hover">
					&nbsp;&nbsp;Kontakt <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
				</a>
			</p>
		</section>
	</div>
@endsection