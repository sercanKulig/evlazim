@extends('layouts.master')

@section('title')
	Giriş Ekranı
@endsection

@section('content')
@include('layouts._flash') 
<div class="row new-post">
	<div class="col-md-2 col-md-offset-5">
		<form action="{{ action('userController@login') }}" method="Post">
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
				<input class="form-control" type="text" placeholder="Email" name="email" id="email"  value="{{ old('email')}}"} >
			</div>
			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">
				<input class="form-control" type="password" placeholder="Şifre" name="password" id="password" >
			</div>
			<button type="submit" class="btn btn-primary">Giriş</button>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
		</form>		
	</div>
</div>


@stop