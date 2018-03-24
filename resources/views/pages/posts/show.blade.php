@extends('layouts.app.sidebar')

@section('sub', 'Aktuell - ')

@section('main')
	<div id="page-content">
		<article class="">
			<section class="text-section">
				<h1>{{ $post->title }}</h1>
				<h6 class="text-muted">Veröffentlicht am <strong>{{ date_format($post->created_at, 'd.m.Y\, H:i') }}</strong> von <strong>{{ $post->user->name }}</strong></h6>
				@auth
					@if(auth()->user()->perm_posts)
						<a class="btn btn-outline-primary" href="{{ route('posts.edit', $post->id) }}">Bearbeiten</a>
					@endif
				@endauth
			</section>
			<section class="article-body">
				{!! $post->body !!}
			</section>
		</article>
	</div>
	<script>
		$(document).ready(function () {
			$('.article-body p:has(img)').addClass('img-container')
		});
	</script>
@endsection
