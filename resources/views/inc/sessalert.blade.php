@if(session('info'))
	<div class="alert alert-info">
		{{ session('info') }}
	</div>
@endif
@if(session('error') && is_array(session('error')))
	@foreach(session('error') as $error)
		<div class="alert alert-danger">
			{{ $error }}
		</div>
	@endforeach
@elseif(session('error'))
	<div class="alert alert-danger">
		{{ session('error') }}
	</div>
@endif
@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif
