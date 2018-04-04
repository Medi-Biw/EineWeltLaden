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
{{--@if(session('errors') && is_array(session('errors')))
	@foreach(session('errors') as $error)
		<div class="alert alert-danger">
			{{ $error }}
		</div>
	@endforeach
@elseif(session('errors'))
	<div class="alert alert-danger">
		{{ session('errors') }}
	</div>
@endif--}}
@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif
{{--
@if($error ?? false)@php dump($error) @endphp@endif
@if($errors ?? false)@php dump($errors) @endphp@endif
--}}
