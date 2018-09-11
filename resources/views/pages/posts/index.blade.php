@extends('layouts.app.sidebar')

@section('sub', 'Aktuell - ')

@section('main')
	<div id="page-content">
		<h1 class="posts-title">Letzte Beiträge
			@auth
				@if(auth()->user()->perm_posts)
					<a class="btn btn-outline-primary float-right" href="{{ route('posts.create') }}">Neuer Beitrag</a>
				@endif
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
							{!! substr(strip_tags($post->body, '<br><p>'), 0, 149) !!}{!! (count_chars($post->body) > 150) ? '&nbsp;&hellip;' : '' !!}
						</p>
						<a href="{{ route('posts.show', $post->id) }}" class="card-link">Weiterlesen</a>
						@auth
							@if(auth()->user()->perm_posts)
								<a href="{{ route('posts.edit', $post->id) }}" class="card-link">Bearbeiten</a>
								<a href="{{ route('posts.destroy', $post->id) }}" class="card-link"
								   onclick="deleteArticle(event, '{{ route('posts.destroy', $post->id) }}'); return false;"
								>Löschen</a>
							@endif
						@endauth
					</div>
				</div>
			@endforeach
		</section>
	</div>
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
	<script>
		function deleteArticle(e, url) {
			e.preventDefault();
			alertify
				.cancelBtn("Abbrechen")
				.confirm('Löschen bestätigen', function () {
				$.ajax({
					url: url,
					type: 'DELETE',
					success: function (result) {
						if (result.success === true)
							window.location = '{{ route('posts.index') }}';
						else deleteError();
					},
					error: function() { deleteError() }
				});
			});
		}
		function deleteError() {
			alertify.alert('<strong>Fehler beim Löschen des Artikels.</strong><br>Versuchen Sie es später nochmal.')
		}
	</script>
@endsection
