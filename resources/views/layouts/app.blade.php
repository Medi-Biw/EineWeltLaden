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

	<link href="{{ asset('css/fa-svg-with-js.css') }}" rel="stylesheet">
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
	{{--<script src="{{ asset('js/fontawesome/fontawesome-all.min.js') }}"></script>--}}
	<script src="{{ asset('js/app.js') }}"></script>
	@stack('scripts')
</head>
<body>
<div id="app" class="container d-flex flex-column align-items-stretch">
	@include('inc.navbar')
	<div id="content">
		@yield('content')
	</div>
</div>
</body>
</html>
