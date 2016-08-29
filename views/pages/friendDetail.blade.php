@extends('layouts.master')

@section('title')
    {{ $newfriends->baslik }}
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
                        <h4>{{$newfriends->baslik}}</h4>
                        <hr>
                        <h4>{{$newfriends->fiyat}}</h4>
                        <hr>
                        <h4>{{$newfriends->ayrinti}}</h4>
                        <hr>
                        <div class="form-group {{ $errors->has('cinsiyet') ? 'has-error' : '' }} ">
                            {{ Form::label('erkek', 'Erkek') }}
                            {{ Form::checkbox('cinsiyet',null,$newfriends->cinsiyet == 1, array('disabled')) }}
                            {{ Form::label('kadin', 'Kadın') }}
                            {{ Form::checkbox('cinsiyet',null,$newfriends->cinsiyet == 2, array('disabled')) }}
                            {{ Form::label('farketmez', 'Farketmez') }}
                            {{ Form::checkbox('cinsiyet',null,$newfriends->cinsiyet == 3, array('disabled')) }}
                        </div>

                        <hr>
                        <div class="form-group {{ $errors->has('neden') ? 'has-error' : '' }} ">
                            {{ Form::label('ogrenci', 'Öğrenci') }}
                            {{ Form::checkbox('neden',null,$newfriends->neden == 1, array('disabled')) }}
                            {{ Form::label('calisan', 'Çalışan') }}
                            {{ Form::checkbox('neden',null,$newfriends->neden == 2, array('disabled')) }}
                            {{ Form::label('farketmez', 'Farketmez') }}
                            {{ Form::checkbox('neden',null,$newfriends->neden == 3, array('disabled')) }}
                        </div>
                        <hr>
                        {{ Form::label('elektrik', 'Elektirik') }}
                        {{ Form::checkbox('elektrik',null,$newfriends->elektrik == 1, array('disabled')) }}
                        {{ Form::label('su', 'Su') }}
                        {{ Form::checkbox('su',null,$newfriends->su == 1, array('disabled')) }}
                        {{ Form::label('dogalgaz', 'Doğalgaz') }}
                        {{ Form::checkbox('dogalgaz',null,$newfriends->dogalgaz == 1, array('disabled')) }}
                        {{ Form::label('internet', 'İnternet') }}
                        {{ Form::checkbox('internet',null,$newfriends->internet == 1, array('disabled')) }}
                        <hr>
                    </div>
                    <h3>Adres</h3>
                    <div>
                        <ul>
                            <li>
                                <h4>{{$newfriends->acik_adres}}</h4>
                                <h4>{{$newfriends->sehir}} / {{$newfriends->ilce}}</h4>
                            </li>
                        </ul>
                    </div>
                    <h3>Resim</h3>
                    <div>
                        <div id="gallery-images">
                            <ul>
                                @foreach($newfriends->friend_pics as $image)
                                    <li>
                                        @if($image->main == 1)
                                        <a href="{{ url($image->file_path) }}" data-lightbox="myPictures">
                                            <img src="{{ url($image->file_path) }}">
                                        </a>
                                        @endif
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
                                    {{ Form::label('tek_yatak', 'Tek Kişilik Yatak') }}
                                    {{ Form::checkbox('yatak',null,$newfriends->yatak == 1, array('disabled')) }}
                                    {{ Form::label('çift_yatak', 'Çift Kişilik Yatak') }}
                                    {{ Form::checkbox('yatak',null,$newfriends->yatak == 2, array('disabled')) }}
                                    {{ Form::label('ranza', 'Ranza') }}
                                    {{ Form::checkbox('yatak',null,$newfriends->yatak == 3, array('disabled')) }}
                                    <hr>
                                </div>
                                {{ Form::label('gardorap', 'Gardorap') }}
                                {{ Form::checkbox('gardorap',null,$newfriends->gardorap == 1, array('disabled')) }}
                                {{ Form::label('komidin', 'Şifonyer / Komidin') }}
                                {{ Form::checkbox('komidin',null,$newfriends->komidin == 1, array('disabled')) }}
                                {{ Form::label('hali', 'Halı') }}
                                {{ Form::checkbox('hali',null,$newfriends->hali == 1, array('disabled')) }}
                                {{ Form::label('perde', 'Perde') }}
                                {{ Form::checkbox('perde',null,$newfriends->perde == 1, array('disabled')) }}
                                <hr>

                                {{ Form::label('calisma_masasi', 'Çalışma masası') }}
                                {{ Form::checkbox('calisma_masasi',null,$newfriends->calisma_masasi == 1, array('disabled')) }}
                                {{ Form::label('sandalye', 'Çalışma masası için sandaye(Ofis vs.)') }}
                                {{ Form::checkbox('sandalye',null,$newfriends->sandalye == 1, array('disabled')) }}
                                {{ Form::label('lamba', 'Masa lambası') }}
                                {{ Form::checkbox('lamba',null,$newfriends->lamba == 1, array('disabled')) }}
                                {{ Form::label('kitaplik', 'Kitaplık') }}
                                {{ Form::checkbox('kitaplik',null,$newfriends->kitaplik == 1, array('disabled')) }}
                                <hr>

                                {{ Form::label('ekstra_isitici', 'Ekstra ısıtıcılar(elektrikli ısıtıcılar vs)') }}
                                {{ Form::checkbox('ekstra_isitici',null,$newfriends->ekstra_isitici == 1, array('disabled')) }}
                                <br>
                                {{ Form::label('ekstra_sogutucu', 'Ekstra soğutucular(vantilatör, klima vs)') }}
                                {{ Form::checkbox('ekstra_sogutucu',null,$newfriends->ekstra_sogutucu == 1, array('disabled')) }}

                            </li>
                        </ul>
                    </div>
                    <h3>Ev ve Bina Bilgileri</h3>
                    <div>

                        <h4>Evde oda sayisi : {{$newfriends->oda_sayisi}}</h4>
                        <h4>Evde kalan sayisi : {{$newfriends->evde_kalan}}</h4>
                        <h4>Isınma çeşidi : {{$newfriends->isinma_cesidi}}</h4>
                        <hr>
                        {{ Form::label('oturma_odasi', 'Oturma odası var mı?') }}
                        {{ Form::checkbox('oturma_odasi',null,$newfriends->oturma_odasi == 1, array('disabled')) }}
                        {{ Form::label('beyaz_esya', 'Beyaz eşya var mı?') }}
                        {{ Form::checkbox('beyaz_esya',null,$newfriends->beyaz_esya == 1, array('disabled')) }}
                        {{ Form::label('mutfak_esya', 'Mutfak Eşyası var mı?') }}
                        {{ Form::checkbox('mutfak_esya',null,$newfriends->mutfak_esya == 1, array('disabled')) }}
                        {{ Form::label('televizyon', 'Televizyon var mı? ') }}
                        {{ Form::checkbox('televizyon',null,$newfriends->televizyon == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('alaturka', 'Alaturka tuvalet') }}
                        {{ Form::checkbox('tuvalet',null,$newfriends->tuvalet == 1, array('disabled')) }}
                        {{ Form::label('alafranga', 'Alafranga tuvalet') }}
                        {{ Form::checkbox('tuvalet',null,$newfriends->tuvalet == 2, array('disabled')) }}
                        {{ Form::label('iki_tuvalet', 'İki tuvaletten de var') }}
                        {{ Form::checkbox('tuvalet',null,$newfriends->tuvalet == 3, array('disabled')) }}
                        <hr>

                        <h4>Tahmini bina yaşı : {{$newfriends->bina_yasi}}</h4>
                        <h4>Evin katı : {{$newfriends->evin_kati}}</h4>
                        <hr>
                        {{ Form::label('daire', 'Daire') }}
                        {{ Form::checkbox('ev',null,$newfriends->ev == 1, array('disabled')) }}
                        {{ Form::label('mustakil ev', 'Müstakil ev') }}
                        {{ Form::checkbox('ev',null,$newfriends->ev == 2, array('disabled')) }}
                        <hr>
                        {{ Form::label('dogu', 'Doğu') }}
                        {{ Form::checkbox('cephe',null,$newfriends->cephe == 1, array('disabled')) }}
                        {{ Form::label('bati', 'Batı') }}
                        {{ Form::checkbox('cephe',null,$newfriends->cephe == 2, array('disabled')) }}
                        {{ Form::label('guney', 'Güney') }}
                        {{ Form::checkbox('cephe',null,$newfriends->cephe == 3, array('disabled')) }}
                        {{ Form::label('kuzey', 'Kuzey') }}
                        {{ Form::checkbox('cephe',null,$newfriends->cephe == 4, array('disabled')) }}
                        <hr>
                    </div>
                    <h3>Ayrıntılar</h3>
                    <div>
                        {{ Form::label('hayvan', 'Evde hayvan var mı? ') }}
                        {{ Form::checkbox('hayvan',null,$newfriends->hayvan == 1, array('disabled')) }}
                        {{ Form::label('sigara', 'Sigara içiliyor mu? ') }}
                        {{ Form::checkbox('sigara',null,$newfriends->sigara == 1, array('disabled')) }}
                        {{ Form::label('alkol', 'Alkol kullanılıyor mu? ') }}
                        {{ Form::checkbox('alkol',null,$newfriends->alkol == 1, array('disabled')) }}
                        {{ Form::label('kalabalik', 'Eve gelen giden çok olur mu? ') }}
                        {{ Form::checkbox('kalabalik',null,$newfriends->kalabalik == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('site', 'Site içi mi? ') }}
                        {{ Form::checkbox('site',null,$newfriends->site == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('gorevli', 'Görevli var mı? ') }}
                        {{ Form::checkbox('gorevli',null,$newfriends->gorevli == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('guvenlik', 'Güvenlik var mı? ') }}
                        {{ Form::checkbox('guvenlik',null,$newfriends->guvenlik == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('otopark', 'Otopark var mı? ') }}
                        {{ Form::checkbox('otopark',null,$newfriends->otopark == 1, array('disabled')) }}
                        <hr>
                        {{ Form::label('asansor', 'Asansör var mı? ') }}
                        {{ Form::checkbox('asansor',null,$newfriends->asansor == 1, array('disabled')) }}
                    </div>
                    <h3>Yorumlar</h3>
                    <div>
                        <div>
                            <div>
                                @if($friendcomment != null)
                                    @foreach($friendcomment as $comment )
                                        @if($comment->block != 0 && $comment->post_id == $newfriends->id)
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


                        <form action="{{ action('userPageController@newFriendCommentRun', $newfriends->id) }}" method="Post">
                            {{ Form::hidden('post_id', $newfriends->id) }}
                            {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('yorum') ? 'has-error' : '' }} ">
                            <textarea name="yorum" cols="80" rows="8" placeholder="Yorumlarınız">{{ old('yorum')}}</textarea>
                        </div>
                            <button class="btn btn-default" type="submit">Gönder</button>
                        </form>

                    </div>


                </div>
                <div class="form-group">
                    <a href="{{ url()->previous() }}" class="btn btn-default">Geri</a>
                </div>
        </div>
    </div>
@stop