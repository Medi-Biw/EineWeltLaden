@extends('layouts.app')
@section('content')
	<aside id="sidebar">
		<div class="sidebar-content">
			<div class="list-group links">
				@if (!empty($sidenavitems))
					@foreach($sidenavitems as $item)
						@if(is_array($item))
						<a href="{{ $item['link'] }}" class="list-group-item list-group-item-action link {{ $request->fullUrl() == $item['link'] ? ' active' : '' }}">
							{!! $item['title'] !!}
						</a>
						@elseif($item == 'divider')
							<div class="list-group-item list-group-item-divider"></div>
						@endif
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
		<section id="alert-section">
			@include('inc.sessalert')
		</section>
		@yield('main')
	</main>
@endsection