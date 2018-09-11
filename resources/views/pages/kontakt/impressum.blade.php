@extends('layouts.app.sidebar')

@section('sub', 'Impressum - ')

@section('main')
	<div id="page-content">
		<section class="text-section">
			<h1>Impressum</h1>
			<hr>
		</section>
		<section class="text-section">
			<h4>Angaben gem&auml;&szlig; &sect; 5 TMG:</h4>
			<address>
				<strong>Pax et Bonum - Eine Welt Laden e.V.</strong>
				<br>Dresdner Stra&szlig;e 11
				<br>01877 Bischofswerda
			</address>

			<h4>Vertreten durch:</h4>
			<address>
				<strong>{{ env('IMPRESS_VERTRETUNG_NAME') }}</strong>
				<br><em>{{ env('IMPRESS_VERTRETUNG_TITEL') }}</em>
				<br><strong>{{ env('IMPRESS_VERTRETUNG_STRASSE') }} {{ env('IMPRESS_VERTRETUNG_HAUSNR') }}</strong>
				<br><strong>{{ env('IMPRESS_VERTRETUNG_PLZ') }} {{ env('IMPRESS_VERTRETUNG_ORT') }}</strong>
			</address>

			<h4>Kontakt:</h4>
			<p>
				Telefon: {{ env('IMPRESS_TEL') }}
				<br>E-Mail: <a href="#" id="revmail" class="reverse">{{ strrev(env('CONTACT_EMAIL_ADDRESS')) }}</a>
			</p>

			<h4>Registereintrag:</h4>
			<p>
				Eintragung im Vereinsregister.
				<br> Registergericht: {{ env('IMPRESS_REGISTERGERICHT') }}
				<br> Registernummer: {{ env('IMPRESS_REGISTERNUMMER') }}
			</p>

			<h4>Umsatzsteuer:</h4>
			<p>
				Umsatzsteuer-Identifikationsnummer gem&auml;&szlig; &sect;27 a Umsatzsteuergesetz:
				<br><strong>{{ env('IMPRESS_USTID') }}</strong>
			</p>

			<h4>Verantwortlich f&uuml;r den Inhalt nach &sect; 55 Abs. 2 RStV:</h4>
			<address>
				<strong>{{ env('IMPRESS_INHALTSVERANTWORTUNG_NAME') }}</strong>
				<br><em>{{ env('IMPRESS_INHALTSVERANTWORTUNG_TITEL') }}</em>
			</address>
		</section>
		<section class="text-section">
			<hr>
		</section>
		<section class="text-section">
			<h4>Technische Umsetzung und Webdesign</h4>
			<p>
				Eric Gesemann @ Medienwerkstatt Bischofswerda
				<br><a href="https://www.medi-biw.de" target="_blank">www.medi-biw.de</a>
			</p>
		</section>
		<section class="text-section">
			<hr>
		</section>
		<section class="text-section">
			<h2>Haftung f&uuml;r Inhalte</h2>
			<p>
				Als Diensteanbieter sind wir gem&auml;&szlig; &sect; 7 Abs.1 TMG f&uuml;r eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach &sect;&sect; 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, &uuml;bermittelte oder gespeicherte fremde Informationen zu &uuml;berwachen oder nach Umst&auml;nden zu forschen, die auf eine rechtswidrige T&auml;tigkeit hinweisen.</p> <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unber&uuml;hrt. Eine diesbez&uuml;gliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m&ouml;glich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.
			</p>
		</section>
		<section class="text-section">
			<h2>Haftung f&uuml;r Links</h2>
			<p>
				Unser Angebot enth&auml;lt Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb k&ouml;nnen wir f&uuml;r diese fremden Inhalte auch keine Gew&auml;hr &uuml;bernehmen. F&uuml;r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf m&ouml;gliche Rechtsverst&ouml;&szlig;e &uuml;berpr&uuml;ft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p> <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.
			</p>
		</section>
		<section class="text-section">
			<h2>Urheberrecht</h2>
			<p>
				Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielf&auml;ltigung, Bearbeitung, Verbreitung und jede Art der Verwertung au&szlig;erhalb der Grenzen des Urheberrechtes bed&uuml;rfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur f&uuml;r den privaten, nicht kommerziellen Gebrauch gestattet.</p> <p>Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.
			</p>
		</section>
		<section class="text-section">
			<p>
				<small>Quelle: <a href="https://www.erecht24.de/impressum-generator.html">https://www.e-recht24.de/impressum-generator.html</a></small>
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