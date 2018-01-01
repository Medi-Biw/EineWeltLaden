<nav class="navbar sticky-top navbar-expand-lg navbar-light" id="top-navbar">
	<div class="brand-wrapper">
		<a class="navbar-brand d-inline-block d-lg-none d-xl-none" href="{{ route('welcome') }}">Pax et Bonum <small>&mdash; Eine Welt Laden e.V.</small></a>
		<div id="brand-image" class="d-md-none d-none d-lg-block d-xl-block">
			<img src="/storage/ewl-header-logo.png">
		</div>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-content">
		<ul class="navbar-nav mr-auto">
			@auth
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
			@endauth
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item{{ Route::is('welcome') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('welcome') }}">Startseite</a>
			</li>
			<li class="nav-item{{ Route::is('posts') ? ' active' : '' }}">
				<a class="nav-link" href="#">Aktuell</a>
			</li>
			<li class="nav-item{{ Route::is('about') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('about', ['sub' => 'verein']) }}">Über uns</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Laden</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Kontakt</a>
			</li>
		</ul>
	</div>
</nav>