<nav class="navbar sticky-top navbar-expand-lg navbar-light" id="top-navbar">
	<div class="brand-wrapper">
		<a class="navbar-brand d-inline-block d-lg-none d-xl-none" href="{{ route('welcome') }}">Pax et bonum <small>&mdash; Eine Welt Laden e.V.</small></a>
		<a id="brand-image" class="d-md-none d-none d-lg-block d-xl-block" href="{{ route('welcome') }}">
			<img src="/storage/ewl-header-logo.png">
		</a>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-content">
		<ul class="navbar-nav mr-auto">
			@auth
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span>{{ Auth::user()->name }}</span><span class="caret"></span></a>

					<div class="dropdown-menu">
						@if(auth()->user()->perm_posts)
							<a class="dropdown-item" href="{{ route('posts.create') }}">
								<span class="icon" style="padding-left: 0.3rem"><i class="far fa-edit"></i></span> Neuer Beitrag
							</a>
						@endif
						@if(auth()->user()->perm_events)
							<a class="dropdown-item" href="{{ route('events.create') }}">
								<span class="icon"><i class="far fa-calendar-edit "></i></span> Neue Veranstaltung
							</a>
						@endif
						@if(auth()->user()->perm_posts || auth()->user()->perm_events)
							<div class="dropdown-divider"></div>
						@endif
						@if(auth()->user()->perm_contact)
							<a class="dropdown-item" href="#">
								<span class="icon"><i class="far fa-envelope"></i></span> Kontaktanfragen
							</a>
							<div class="dropdown-divider"></div>
						@endif
						@if(auth()->user()->perm_openings)
							<a class="dropdown-item" href="{{ route('openings.edit') }}">
								<span class="icon"><i class="far fa-clock"></i></span> Öffnungszeiten bearbeiten
							</a>
						@endif
						@if(auth()->user()->perm_users)
							<a class="dropdown-item" href="#">
								<span class="icon"><i class="far fa-users"></i></span> Benutzer verwalten
							</a>
						@endif
						@if(auth()->user()->perm_openings || auth()->user()->perm_users)
							<div class="dropdown-divider"></div>
						@endif
						<a class="dropdown-item" href="{{ route('profile') }}">
							<span class="icon"><i class="far fa-user"></i></span> Mein Profil
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="icon"><i class="far fa-sign-out"></i></span> Abmelden
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" hidden>
							{{ csrf_field() }}
						</form>
					</div>
				</li>
			@endauth
		</ul>
		<ul class="navbar-nav" id="main-navbar">
			<li class="nav-item{{ Route::is('welcome') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('welcome') }}">Startseite</a>
			</li>
			<li class="nav-item{{ Route::is('posts.*') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('posts.index') }}">Aktuell</a>
			</li>
			<li class="nav-item{{ (Route::is('about') || Route::is('events.*')) ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('about', ['sub' => 'verein']) }}">Über uns</a>
			</li>
			<li class="nav-item{{ Route::is('laden') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('laden', ['sub' => 'sortiment']) }}">Laden</a>
			</li>
			<li class="nav-item{{ Route::is('kontakt') ? ' active' : '' }}">
				<a class="nav-link" href="{{ route('kontakt', ['sub' => 'info']) }}">Kontakt</a>
			</li>
		</ul>
	</div>
</nav>