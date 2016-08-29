@extends('layouts.master')

@section('title')
	Giriş Ekranı
@endsection

@section('content')

	@include('layouts._flash')
	
		<div class="col-md-2 col-md-offset-2">
			<form action="{{ action('pageController@newHouse') }}" method="Post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group {{ $errors->has('baslik') ? 'has-error' : '' }} ">
					<input type="text" name="baslik" hint="baslik" placeholder="Başlık" value="{{ old('baslik')}}">
				</div>
				<div class="form-group {{ $errors->has('il') ? 'has-error' : '' }} ">
					<input type="text" name="il" hint="il" placeholder="İl" value="{{ old('il')}}">
				</div>
				<div class="form-group {{ $errors->has('ilce') ? 'has-error' : '' }} ">
					<input type="text" name="ilce" hint="ilce" placeholder="İlçe" value="{{ old('ilce')}}">
				</div>
				<div class="form-group {{ $errors->has('mahalle') ? 'has-error' : '' }} ">
					<input type="text" name="mahalle" hint="mahalle" placeholder="Semt" value="{{ old('mahalle')}}">
				</div>
				<div class="form-group {{ $errors->has('odaSayisi') ? 'has-error' : '' }} ">
					<input type="text" name="odaSayisi" hint="odaSayisi" placeholder="Boş Oda Sayısı" value="{{ old('odaSayisi')}}">
				</div>
				<div class="form-group {{ $errors->has('cinsiyet') ? 'has-error' : '' }} ">
					<input type="text" name="cinsiyet" hint="cinsiyet" placeholder="Cinsiyet" value="{{ old('cinsiyet')}}">
				</div>
				<div class="form-group {{ $errors->has('ayrinti') ? 'has-error' : '' }} ">
					<textarea name="ayrinti" cols="30" rows="10" placeholder=" Ayrintilar"  value="{{ old('ayrinti')}}"></textarea>
				</div>

				<div class="form-group">
					<button class="btn btn-succes">Kaydet</button>
				</div>	
			</form>
		</div>
	

@stop