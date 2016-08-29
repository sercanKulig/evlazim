@extends('layouts.master')

@section('title')
 {{ $newhouses->baslik }}
@endsection

@section('content')
<script scr="https://maps.googleapis.com/maps/api.js?key=AIzaSyCyB6KlCFUQlRwVJ-nyXxd6W0rfiIBe12Q"></script>

	@include('layouts._flash')

		<script>

		</script>
	<div class="col-md-2 col-md-offset-2">
		<div class="container">
				<div id="accordion">
					<h3>Genel Bilgi</h3>
					<div>
						<h4>{{$newhouses->baslik}}</h4>
						<hr>
						<h4>{{$newhouses->fiyat}}</h4>
						<hr>
						<h4>{{$newhouses->ayrinti}}</h4>
						<hr>
						<h4>Kiminle eve çıkmak istersiniz</h4>
						<div class="form-group {{ $errors->has('kiralar_mısın') ? 'has-error' : '' }} ">
							{{ Form::label('ogrenci', 'Öğrenci') }}
							{{ Form::checkbox('kiralar_misin',null,$newhouses->kiralar_misin == 1, array('disabled')) }}
							{{ Form::label('calisan', 'Çalışan') }}
							{{ Form::checkbox('kiralar_misin',null,$newhouses->kiralar_misin == 2, array('disabled')) }}
							{{ Form::label('farketmez', 'Farketmez') }}
							{{ Form::checkbox('kiralar_misin',null,$newhouses->kiralar_misin == 2, array('disabled')) }}
						</div>
					</div>
					<h3>Adres</h3>
					<div>
						<ul>
							<li>
								<h4>{{$newhouses->aciklama}}</h4>
								<h4>{{$newhouses->sehir}} / {{$newhouses->ilce}} / {{$newhouses->semt}}</h4>
							</li>
						</ul>
					</div>
					<h3>Resim</h3>
					<div>
						<div id="gallery-images">
							<ul>
								@foreach($newhouses->home_pics as $image)
									<li>
										<a href="{{ url($image->file_path) }}" data-lightbox="myPictures">
											<img src="{{ url($image->file_path) }}">
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<h3>Oda Bilgileri</h3>
					<div>
						<ul>
							<li>

								<div class="form-group {{ $errors->has('yatak') ? 'has-error' : '' }} ">
									{{ Form::label('daire', 'Daire') }}
									{{ Form::checkbox('ev',null,$newhouses->ev == 1, array('disabled')) }}
									{{ Form::label('mustakil', 'Müstakil') }}
									{{ Form::checkbox('ev',null,$newhouses->ev == 2, array('disabled')) }}
									<hr>
								</div>
								{{ Form::label('esyasiz', 'Eşyasız') }}
								{{ Form::checkbox('esyali',null,$newhouses->esyali == 1, array('disabled')) }}
								{{ Form::label('esyali', 'Esyali') }}
								{{ Form::checkbox('esyali',null,$newhouses->esyali == 2, array('disabled')) }}
								<hr>

								<h4>Evin oda sayisi : {{$newhouses->oda_sayisi}}</h4>
								<h4>Evin bulunduğu kat : {{$newhouses->kat}}</h4>
								<h4>Evin tahmini yaşı : {{$newhouses->yas}}</h4>
								<h4>Isınma çeşidi : {{$newhouses->isitma}}</h4>

							</li>
						</ul>
					</div>
					<h3>Ev ve Bina Bilgileri</h3>
					<div>
						{{ Form::label('dogu', 'Doğu') }}
						{{ Form::checkbox('cephe',null,$newhouses->cephe == 1, array('disabled')) }}
						{{ Form::label('bati', 'Batı') }}
						{{ Form::checkbox('cephe',null,$newhouses->cephe == 2, array('disabled')) }}
						{{ Form::label('guney', 'Güney') }}
						{{ Form::checkbox('cephe',null,$newhouses->cephe == 3, array('disabled')) }}
						{{ Form::label('kuzey', 'Kuzey') }}
						{{ Form::checkbox('cephe',null,$newhouses->cephe == 4, array('disabled')) }}
						<hr>
						<h4>Çevrediler</h4>
						{{ Form::label('universite', 'Üniversite ') }}
						{{ Form::checkbox('universite',null,$newhouses->universite == 1, array('disabled')) }}
						{{ Form::label('sehir_merkezi', 'Şehir merkezi') }}
						{{ Form::checkbox('sehir_merkezi',null,$newhouses->sehir_merkezi == 1, array('disabled')) }}
						{{ Form::label('market', 'Market ') }}
						{{ Form::checkbox('market',null,$newhouses->market == 1, array('disabled')) }}
						{{ Form::label('saglik_ocagi', 'Sağlık ocağı ') }}
						{{ Form::checkbox('saglik_ocagi',null,$newhouses->saglik_ocagi == 1, array('disabled')) }}
						{{ Form::label('eczane', 'Eczane ') }}
						{{ Form::checkbox('eczane',null,$newhouses->eczane == 1, array('disabled')) }}
						<hr>
						{{ Form::label('eglence', 'Eğlence Merkezleri ') }}
						{{ Form::checkbox('eglence',null,$newhouses->eglence == 1, array('disabled')) }}
						{{ Form::label('pazar', 'Pazar') }}
						{{ Form::checkbox('pazar',null,$newhouses->pazar == 1, array('disabled')) }}
						{{ Form::label('cami', 'Cami ') }}
						{{ Form::checkbox('cami',null,$newhouses->cami == 1, array('disabled')) }}
						{{ Form::label('spor_salonu', 'Spor salonu ') }}
						{{ Form::checkbox('spor_salonu',null,$newhouses->spor_salonu == 1, array('disabled')) }}
						{{ Form::label('park', 'Park ') }}
						{{ Form::checkbox('park',null,$newhouses->park == 1, array('disabled')) }}
						<hr>
						<h4>Ulaşım</h4>
						{{ Form::label('anayol', 'Anayol ') }}
						{{ Form::checkbox('anayol',null,$newhouses->anayol == 1, array('disabled')) }}
						{{ Form::label('cadde', 'Cadde') }}
						{{ Form::checkbox('cadde',null,$newhouses->cadde == 1, array('disabled')) }}
						{{ Form::label('otobüs', 'Otobüs ') }}
						{{ Form::checkbox('otobüs',null,$newhouses->otobüs == 1, array('disabled')) }}
						{{ Form::label('dolmuş', 'Dolmuş ') }}
						{{ Form::checkbox('dolmuş',null,$newhouses->dolmuş == 1, array('disabled')) }}
						{{ Form::label('metro', 'Metro ') }}
						{{ Form::checkbox('metro',null,$newhouses->metro == 1, array('disabled')) }}
						<hr>
						{{ Form::label('tren', 'Tren ') }}
						{{ Form::checkbox('tren',null,$newhouses->tren == 1, array('disabled')) }}
						{{ Form::label('metrobüs', 'Metrobüs') }}
						{{ Form::checkbox('metrobüs',null,$newhouses->metrobüs == 1, array('disabled')) }}
						{{ Form::label('iskele', 'İskele ') }}
						{{ Form::checkbox('iskele',null,$newhouses->iskele == 1, array('disabled')) }}
						{{ Form::label('minibüs', 'Minibüs ') }}
						{{ Form::checkbox('minibüs',null,$newhouses->minibüs == 1, array('disabled')) }}
						{{ Form::label('teleferik', 'Teleferik ') }}
						{{ Form::checkbox('teleferik',null,$newhouses->teleferik == 1, array('disabled')) }}
					</div>
						<h3>Yorumlar</h3>
						<div>
							<div>
								<div>
									@if($homecomment != null)
										@foreach($homecomment as $comment )
											@if($comment->block != 0 && $comment->post_id == $newhousesgit->id)
												<table>
													<ul>
														<li>
															<div id="comment-up">
																{{ $comment->yorum }}<br>
															</div>
														</li>
														<li>
															<div id="comment-bottom">
																{{ $comment->user }}
																{{ $comment->created_at }}
															</div>
														</li>
													</ul>
													<hr>
												</table>
											@endif
										@endforeach
									@endif
								</div>
							</div>


						<form action="{{ action('userPageController@newFriendCommentRun', $newhouses->id) }}" method="Post">
								{{ Form::hidden('post_id', $newhouses->id) }}
								{{ csrf_field() }}
								<div class="form-group {{ $errors->has('yorum') ? 'has-error' : '' }} ">
									<textarea name="yorum" cols="80" rows="8" placeholder="Yorumlarınız">{{ old('yorum')}}</textarea>
								</div>
								<button class="btn btn-default" type="submit">Gönder</button>
						</form>

					</div>
				<div class="form-group">
					<a href="{{ url()->previous() }}" class="btn btn-default">Geri</a>
				</div>
		</div>
	</div>
@stop