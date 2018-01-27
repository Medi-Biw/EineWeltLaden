@extends('layouts.app.sidebar')

@section('sub', 'Aktuell - ')

@section('main')
	<div id="page-content">
		<h1 class="posts-title">Letzte Beiträge
			@auth
				<a class="btn btn-outline-primary float-right" href="{{ route('posts.create') }}">Neuer Beitrag</a>
			@endauth</h1>
		<br>
		<section class="posts-list">
			@foreach($posts as $post)
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">{{ $post->title }}</h5>
						<h6 class="card-subtitle mb-2 text-muted">
							<small>{{ date_format($post->created_at, 'd.m.Y H:i') }} | {{ $post->user->name }}</small>
						</h6>
						<p class="card-text">
							{{ substr(strip_tags($post->body), 0, 149) }}{{ (count_chars($post->body) > 150) ? '&nbsp;&hellip;' : '' }}
						</p>
						<a href="{{ route('posts.show', $post->id) }}" class="card-link">Weiterlesen</a>
						@auth
							<a href="{{ route('posts.edit', $post->id) }}" class="card-link">Bearbeiten</a>
							<a href="{{ route('posts.edit', $post->id) }}" class="card-link">Löschen</a>
						@endauth
					</div>
				</div>
			@endforeach
		</section>
	</div>
@endsection
