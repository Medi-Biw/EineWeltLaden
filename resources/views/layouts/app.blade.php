<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="apple-mobile-web-app-title" content="Pax et bonum">
	<meta name="application-name" content="Pax et bonum">
	<meta name="theme-color" content="#ffffff">
	@stack('meta')

	<title>@yield('page_title')@yield('sub')@yield('title', 'Pax et bonum - Eine Welt Laden e.V.')</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="194x194" href="/favicon-194x194.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	@stack('styles')
	<script src="{{ asset('js/app.js') }}"></script>
	@stack('scripts')
</head>
<body>
<div id="ie-block" hidden>
	<div>
		<h3><b>Hoppla.</b> Sie verwenden den veralteten Internet Explorer.</h3>
		<p>Ihr Browser ist bereits seit Längerem nicht mehr dazu geeignet, Internetseiten, die aktuelle Webstandards anwenden, ordnungsgemäß darzustellen.</p>
		<div>
			Bitte verwenden Sie einen aktuellen Webrowser, wie zum Beispiel:
			<ul>
				<li><b><a href="https://www.mozilla.org/de/firefox/" target="_self">Mozilla Firefox</a></b> <em>(empfohlen)</em></li>
				<li><a href="https://www.google.com/intl/de/chrome/" target="_self">Google Chome</a></li>
				<li style="list-style: none">oder</li>
				<li><a href="https://www.opera.com/" target="_self">Opera</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="app" class="container d-flex flex-column align-items-stretch">
	@include('inc.navbar')
	<div id="content">
		@yield('content')
	</div>
</div>
<!--[if lte IE 9]>
<script>
	var ie = document.getElementById('ie-block');
	ie.removeAttribute('hidden');
	var app = document.getElementById('app');
	app.className += ' hidden';
</script>
<![endif]-->
</body>
</html>
