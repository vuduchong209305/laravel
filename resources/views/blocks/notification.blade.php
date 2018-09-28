@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if (session('error'))
	<div class="alert alert-danger" role="alert">
		{{ session('error') }}
	</div>
@endif

@if (session('success'))
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
	</div>
@endif