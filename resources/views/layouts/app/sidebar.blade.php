@extends('layouts.app')
@section('content')
	<aside id="sidebar">
		<div style="position: sticky; top: 250px">
			<div class="list-group links">
				@if (!empty($sidenavitems))
					@foreach($sidenavitems as $item)
						<a href="{{ $item['link'] }}" class="list-group-item list-group-item-action link {{ $request->fullUrl() == $item['link'] ? ' active' : '' }}">
							{{ $item['title'] }}
						</a>
					@endforeach
				@endif
			</div>
			{{--<ul>
				<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
				<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
			</ul>--}}
		</div>
	</aside>
	<main id="main">
		@yield('main')
		<div class="loader">
			<i class="far fa-circle-notch fa-spin"></i>
		</div>
	</main>
@endsection