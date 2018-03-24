@extends('layouts.app.sidebar')

@section('page_title', 'Standort - ')
@section('sub', 'Laden - ')

@section('main')
	<div id="page-content">
		<h1>Eine-Welt-Laden</h1>
		<section class="wide-image-section">
			<iframe src="https://snazzymaps.com/embed/38204"></iframe>
		</section>
		<section class="text-section">
			<h3>Besuchen Sie uns!</h3>
			<address>
				<strong>
					<span>Pax et bonum</span>
					<br><span>Eine Welt Laden e.V.</span>
				</strong>
				<br><span>Dresdner Straße 11</span>
				<br><span>01877 Bischofswerda</span>
			</address>
			<a href="{{ route('kontakt', ['sub' => 'info']) }}" class="btn btn-outline-primary btn-rounded btn-fa-hover">
				&nbsp;&nbsp;Kontakt <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
			</a>
			<img src="{{ asset('storage/aussen_1.jpg') }}">
			<span class="img-credit">Unser Laden &mdash; Außenansicht</span>
		</section>
	</div>
@endsection