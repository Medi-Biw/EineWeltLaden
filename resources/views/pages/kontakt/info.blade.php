@extends('layouts.app.sidebar')

@section('sub', 'Kontakt - ')

@section('main')
	<div id="page-content">
		<h1>Kontakt</h1>
		<section class="wide-image-section">
			<img src="/storage/platzhalter/kontaktinfo.jpg">
		</section>
		<section class="text-section">
			<h3>Unser Laden in Bischofswerda</h3>
			<address>
				<p>
					<strong>
						<span>Pax et bonum</span>
						<br><span>Eine Welt Laden e.V.</span>
					</strong>
					<br><span>Dresdner Straße 11</span>
					<br><span>01877 Bischofswerda</span>
				</p>
				<p>
					<span>
						<strong style="display: inline-block; width: 150px;">Email</strong>
						info@example.com
					</span>
					<br>
					<span>
						<strong style="display: inline-block; width: 150px;">Telefon im Laden</strong>
						0 35 94/70 63 39
					</span>
				</p>
			</address>
			<p style="margin-top: 20px;">
				<a href="{{ route('laden', ['sub' => 'öffnungszeiten']) }}" class="btn btn-outline-primary btn-rounded btn-fa-hover" style="min-width: 200px; text-align: right;">
					&nbsp;&nbsp;Öffnungszeiten <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
				</a>
			</p>
			<p>
				<a href="{{ route('kontakt', ['sub' => 'formular']) }}" class="btn btn-outline-primary btn-rounded btn-fa-hover" style="min-width: 200px; text-align: right;">
					&nbsp;&nbsp;Kontaktformular <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
				</a>
			</p>
		</section>
		<section class="text-section">
			<h3>Ansprechpartner</h3>
			<div class="row card-holder">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Sigrun Nützsche</h5>
							<p class="card-text">
								<i class="far fa-phone-square faf-r"></i>
								<a href="tel:+493594701181">0 35 94/70 11 81</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Helgard Hopf</h5>
							<p class="card-text">
								<i class="far fa-phone-square faf-r"></i>
								<a href="tel:+493594701176">0 35 94/70 11 76</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection