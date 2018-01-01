<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@stack('meta')
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link href="{{ asset('css/fa-svg-with-js.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
