@if($errors->any())
	<div class="alert alert-danger">
		@foreach ($errors->all() as $message)
			<li>{{ $message }} </li>
		@endforeach
	</div>
@endif

@if(Session::has('message'))
	<div class="row">
		<div class="col-md-2 col-md-offset-2 success">
			{{ Session::get('message') }}
		</div>
	</div>
@endif