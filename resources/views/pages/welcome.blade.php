@extends('layouts.app.sidebar')
@section('main')
	<div id="page-content">
		<section class="text-center">
			<h1><strong>&#132;Pax et bonum&#147;</strong></h1>
			<h3>Eine Welt Laden e.V.</h3>
			<p class="mb-0">
				<i class="fal fa-heart"></i>-lich willkommen.
			</p>
			<img src="/spirale/spirale_kurven.svg" class="img-fluid" id="svg">
		</section>
	</div>
@endsection
@push('styles')
	<style>
		#svg {
			max-width: 700px;
			-webkit-filter: drop-shadow(0 3px 1px rgba(0, 0, 0, 0.18));
			filter: drop-shadow(0 3px 1px rgba(0, 0, 0, 0.18));
		}
	</style>
@endpush
