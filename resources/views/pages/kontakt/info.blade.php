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
						<a href="#" id="revmail" class="reverse">{{ strrev(env('CONTACT_EMAIL_ADDRESS')) }}</a>
					</span>
					<br>
					<span>
						<strong style="display: inline-block; width: 150px;">Telefon im Laden</strong>
						 0151 51 09 76 32
					</span>
				</p>
			</address>
			<p style="margin-top: 20px;">
				<a href="{{ route('laden', ['sub' => 'standort']) }}"
				   class="btn btn-outline-primary btn-rounded btn-fa-hover"
				   style="min-width: 200px; text-align: right;">
					&nbsp;&nbsp;Standort <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
				</a>
			</p>
			<p style="margin-top: 20px;">
				<a href="{{ route('laden', ['sub' => 'öffnungszeiten']) }}"
				   class="btn btn-outline-primary btn-rounded btn-fa-hover"
				   style="min-width: 200px; text-align: right;">
					&nbsp;&nbsp;Öffnungszeiten <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
				</a>
			</p>
			<p>
				<a href="{{ route('kontakt', ['sub' => 'formular']) }}"
				   class="btn btn-outline-primary btn-rounded btn-fa-hover"
				   style="min-width: 200px; text-align: right;">
					&nbsp;&nbsp;Kontaktformular <i class="fal fa-caret-right faf-l faa-hover"></i>&nbsp;&nbsp;
				</a>
			</p>
		</section>
	</div>
@endsection
@push('styles')
	<style>
		.reverse {
			direction: rtl;
			unicode-bidi: bidi-override;
		}
	</style>
@endpush
@push('scripts')
	<script>
		$(function () {
			let correct = false;
			$('#revmail')
				.on('mousedown', function () {
					let em = "{!! implode('"+"', str_split(strrev(env('CONTACT_EMAIL_ADDRESS')), '2')) !!}"+":o"+"tl"+"iam";
					this.href = em.split('').reverse().join('');
				})
				.on('mouseover', function () {
					if (correct) return;
					$(this).removeClass('reverse');
					let content = $(this).text();
					$(this).html('<span>' + content.split('').reverse().join('</span><span></span><span>'));
					correct = true;
				});
		});
	</script>
@endpush