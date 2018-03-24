@if (session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
@endif
@if (session('error'))
	<div class="alert alert-danger">
		{{ session('error') }}
	</div>
@endif
@if (session('errors') && is_array(session('errors')))
	@foreach(session('errors') as $error)
		<div class="alert alert-danger">
			{!! $error !!}
		</div>
	@endforeach
@endif
@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif
