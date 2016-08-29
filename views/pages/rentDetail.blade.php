@extends('layouts.master')

@section('title')
    {{ $newrents->baslik }}
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
                        <h4>{{$newrents->baslik}}</h4>
                        <hr>
                        <h4>{{$newrents->fiyat}}</h4>
                        <hr>
                        <h4>{{$newrents->ayrinti}}</h4>
                        <hr>
                        <h4>Evinizi öğrenciye kiralar mısınız?</h4>
                        <div class="form-group {{ $errors->has('kiralar_mısın') ? 'has-error' : '' }} ">
                            {{ Form::label('evet', 'Evet') }}
                            {{ Form::checkbox('kiralar_misin',null,$newrents->kiralar_misin == 1, array('disabled')) }}
                            {{ Form::label('hayır', 'Hayır') }}
                            {{ Form::checkbox('kiralar_misin',null,$newrents->kiralar_misin == 2, array('disabled')) }}
                        </div>
                    </div>
                    <h3>Adres</h3>
                    <div>
                        <ul>
                            <li>
                                <h4>{{$newrents->acik_adres}}</h4>
                                <h4>{{$newrents->sehir}} / {{$newrents->ilce}}</h4>
                            </li>
                        </ul>
                    </div>
                    <h3>Resim</h3>
                    <div>
                        <div id="gallery-images">
                            <ul>
                                @foreach($newrents->rent_pics as $image)
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
                                    {{ Form::checkbox('ev',null,$newrents->ev == 1, array('disabled')) }}
                                    {{ Form::label('mustakil', 'Müstakil') }}
                                    {{ Form::checkbox('ev',null,$newrents->ev == 2, array('disabled')) }}
                                    <hr>
                                </div>
                                {{ Form::label('esyasiz', 'Eşyasız') }}
                                {{ Form::checkbox('esyali',null,$newrents->esyali == 1, array('disabled')) }}
                                {{ Form::label('esyali', 'Esyali') }}
                                {{ Form::checkbox('esyali',null,$newrents->esyali == 2, array('disabled')) }}
                                <hr>

                                {{ Form::label('bos', 'Ev boş') }}
                                {{ Form::checkbox('kullanım_durumu',null,$newrents->kullanım_durumu == 1, array('disabled')) }}
                                {{ Form::label('kiraci', 'Evde kiracı var') }}
                                {{ Form::checkbox('kullanım_durumu',null,$newrents->kullanım_durumu == 2, array('disabled')) }}
                                <hr>

                                <h4>Evin oda sayisi : {{$newrents->oda_sayisi}}</h4>
                                <h4>Evin bulunduğu kat : {{$newrents->kat}}</h4>
                                <h4>Evin tahmini yaşı : {{$newrents->yas}}</h4>
                                <h4>Isınma çeşidi : {{$newrents->isitma}}</h4>

                            </li>
                        </ul>
                    </div>
                    <h3>Ev ve Bina Bilgileri</h3>
                    <div>
                        {{ Form::label('dogu', 'Doğu') }}
                        {{ Form::checkbox('cephe',null,$newrents->cephe == 1, array('disabled')) }}
                        {{ Form::label('bati', 'Batı') }}
                        {{ Form::checkbox('cephe',null,$newrents->cephe == 2, array('disabled')) }}
                        {{ Form::label('guney', 'Güney') }}
                        {{ Form::checkbox('cephe',null,$newrents->cephe == 3, array('disabled')) }}
                        {{ Form::label('kuzey', 'Kuzey') }}
                        {{ Form::checkbox('cephe',null,$newrents->cephe == 4, array('disabled')) }}
                        <hr>
                        <h4>Çevrediler</h4>
                        {{ Form::label('universite', 'Üniversite ') }}
                        {{ Form::checkbox('universite',null,$newrents->universite == 1, array('disabled')) }}
                        {{ Form::label('sehir_merkezi', 'Şehir merkezi') }}
                        {{ Form::checkbox('sehir_merkezi',null,$newrents->sehir_merkezi == 1, array('disabled')) }}
                        {{ Form::label('market', 'Market ') }}
                        {{ Form::checkbox('market',null,$newrents->market == 1, array('disabled')) }}
                        {{ Form::label('saglik_ocagi', 'Sağlık ocağı ') }}
                        {{ Form::checkbox('saglik_ocagi',null,$newrents->saglik_ocagi == 1, array('disabled')) }}
                        {{ Form::label('eczane', 'Eczane ') }}
                        {{ Form::checkbox('eczane',null,$newrents->eczane == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('eglence', 'Eğlence Merkezleri ') }}
                        {{ Form::checkbox('eglence',null,$newrents->eglence == 1, array('disabled')) }}
                        {{ Form::label('pazar', 'Pazar') }}
                        {{ Form::checkbox('pazar',null,$newrents->pazar == 1, array('disabled')) }}
                        {{ Form::label('cami', 'Cami ') }}
                        {{ Form::checkbox('cami',null,$newrents->cami == 1, array('disabled')) }}
                        {{ Form::label('spor_salonu', 'Spor salonu ') }}
                        {{ Form::checkbox('spor_salonu',null,$newrents->spor_salonu == 1, array('disabled')) }}
                        {{ Form::label('park', 'Park ') }}
                        {{ Form::checkbox('park',null,$newrents->park == 1, array('disabled')) }}
                        <hr>
                        <h4>Ulaşım</h4>
                        {{ Form::label('anayol', 'Anayol ') }}
                        {{ Form::checkbox('anayol',null,$newrents->anayol == 1, array('disabled')) }}
                        {{ Form::label('cadde', 'Cadde') }}
                        {{ Form::checkbox('cadde',null,$newrents->cadde == 1, array('disabled')) }}
                        {{ Form::label('otobüs', 'Otobüs ') }}
                        {{ Form::checkbox('otobüs',null,$newrents->otobüs == 1, array('disabled')) }}
                        {{ Form::label('dolmuş', 'Dolmuş ') }}
                        {{ Form::checkbox('dolmuş',null,$newrents->dolmuş == 1, array('disabled')) }}
                        {{ Form::label('metro', 'Metro ') }}
                        {{ Form::checkbox('metro',null,$newrents->metro == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('tren', 'Tren ') }}
                        {{ Form::checkbox('tren',null,$newrents->tren == 1, array('disabled')) }}
                        {{ Form::label('metrobüs', 'Metrobüs') }}
                        {{ Form::checkbox('metrobüs',null,$newrents->metrobüs == 1, array('disabled')) }}
                        {{ Form::label('iskele', 'İskele ') }}
                        {{ Form::checkbox('iskele',null,$newrents->iskele == 1, array('disabled')) }}
                        {{ Form::label('minibüs', 'Minibüs ') }}
                        {{ Form::checkbox('minibüs',null,$newrents->minibüs == 1, array('disabled')) }}
                        {{ Form::label('teleferik', 'Teleferik ') }}
                        {{ Form::checkbox('teleferik',null,$newrents->teleferik == 1, array('disabled')) }}
                    </div>
                    <h3>Yorumlar</h3>
                    <div>
                        <div>
                            <div>
                                @if($rentcomment != null)
                                    @foreach($rentcomment as $comment)
                                        @if($comment->block != 0 && $comment->post_id == $newrents->id)
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


                        <form action="{{ action('userPageController@newFriendCommentRun', $newrents->id) }}" method="Post">
                            {{ Form::hidden('post_id', $newrents->id) }}
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