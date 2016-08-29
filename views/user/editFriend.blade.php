@extends('layouts.master')

@section('title')
    Ev Lazım - Liste
@endsection

@section('content')

    @include('layouts._flash')

    <div class="col-md-2 col-md-offset-2">
        <div class="container">
            <form action="{{ action('userPageController@editFriendRun', str_slug($newfriends->baslik)) }}" method="Post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $newfriends->id }}">
                <div id="accordion">
                    <h3>Genel Bilgi</h3>
                    <div>
                        {{ Form::hidden('cesit', 'arkadas_arıyor') }}
                        <div class="form-group {{ $errors->has('baslik') ? 'has-error' : '' }} ">
                            <input type="text" name="baslik" hint="baslik" placeholder="Başlık" value="{{ old('baslik', $newfriends->baslik)}}">
                        </div>
                        <div class="form-group {{ $errors->has('fiyat') ? 'has-error' : '' }} ">
                            <input type="text" name="fiyat" hint="fiyat" placeholder="Başlık" value="{{ old('fiyat', $newfriends->fiyat)}}">
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('cinsiyet') ? 'has-error' : '' }} ">
                            <h4>Ev arkadaşı olarak aradığınız kişi</h4><br>
                            {{ Form::label('erkek', 'Erkek') }}
                            {{ Form::radio('cinsiyet', 1, $newfriends->cinsiyet == 1, (old('cinsiyet') == '1'), array('id'=>'1')) }}
                            {{ Form::label('kadin', 'Kadın') }}
                            {{ Form::radio('cinsiyet', 2, $newfriends->cinsiyet == 2, (old('cinsiyet') == '2'), array('id'=>'2')) }}
                            {{ Form::label('farketmez', 'Farketmez') }}
                            {{ Form::radio('cinsiyet', 3, $newfriends->cinsiyet == 3, (old('cinsiyet') == '3'), array('id'=>'3')) }}
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('neden') ? 'has-error' : '' }} ">
                            {{ Form::label('ogrenci', 'Öğrenci') }}
                            {{ Form::radio('neden', 1, $newfriends->neden == 1, (old('neden') == '1'), array('id'=>'1')) }}
                            {{ Form::label('calisan', 'Çalışan') }}
                            {{ Form::radio('neden', 2, $newfriends->neden == 2, (old('neden') == '2'), array('id'=>'2')) }}
                            {{ Form::label('farketmez', 'Farketmez') }}
                            {{ Form::radio('neden', 3, $newfriends->neden == 3, (old('neden') == '3'), array('id'=>'3')) }}
                        </div>
                        <hr>
                        <h4>Evde Bağlı olanlar</h4>
                        <br>


                        {{ Form::label('elektrik', 'Elektirik') }}
                        {{ Form::hidden('elektrik', 0) }}
                        {{ Form::checkbox('elektrik',1,$newfriends->elektrik == 1, array('id'=>'elektrik')) }}
                        {{ Form::label('su', 'Su') }}
                        {{ Form::hidden('su', 0) }}
                        {{ Form::checkbox('su',1,$newfriends->su == 1, array('id'=>'su')) }}
                        {{ Form::label('dogalgaz', 'Doğalgaz') }}
                        {{ Form::hidden('dogalgaz', 0) }}
                        {{ Form::checkbox('dogalgaz',1,$newfriends->dogalgaz == 1, array('id'=>'dogalgaz')) }}
                        {{ Form::label('internet', 'İnternet') }}
                        {{ Form::hidden('internet', 0) }}
                        {{ Form::checkbox('internet',1,$newfriends->internet == 1, array('id'=>'internet')) }}
                        <hr>
                        <div class="form-group {{ $errors->has('ayrinti') ? 'has-error' : '' }} ">
                            <textarea name="ayrinti" cols="30" rows="10" placeholder="Kendinizi ve evinizle ilgili eklemek istedikleriniz">{{ old('ayrinti', $newfriends->ayrinti)}}</textarea>
                        </div>
                    </div>
                    <h3>Adres</h3>
                    <div>
                        <ul>
                            <li>
                                <div class="form-group {{ $errors->has('sehir') ? 'has-error' : '' }} ">
                                    <input type="text" name="sehir" hint="sehir" placeholder="* Şehir" value="{{ old('sehir', $newfriends->sehir)}}">
                                </div>
                                <div class="form-group {{ $errors->has('ilce') ? 'has-error' : '' }} ">
                                    <input type="text" name="ilce" hint="ilce" placeholder="* İlçe" value="{{ old('ilce', $newfriends->ilce)}}">
                                </div>

                                <div class="form-group {{ $errors->has('acik_adres') ? 'has-error' : '' }} ">
                                    <textarea name="acik_adres" cols="30" rows="10" placeholder="*  Açık Adresiniz">{{ old('ayrinti', $newfriends->acik_adres)}}</textarea>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3>Oda Bilgileri</h3>
                    <div>
                        <ul>
                            <li>

                                <div class="form-group {{ $errors->has('yatak') ? 'has-error' : '' }} ">
                                    {{ Form::label('tek_yatak', 'Tek Kişilik Yatak') }}
                                    {{ Form::radio('yatak', '1', $newfriends->yatak == 1, (old('yatak') == '1'), array('id'=>'1')) }}
                                    {{ Form::label('çift_yatak', 'Çift Kişilik Yatak') }}
                                    {{ Form::radio('yatak', '2', $newfriends->yatak == 2, (old('yatak') == '2'), array('id'=>'2')) }}
                                    {{ Form::label('ranza', 'Ranza') }}
                                    {{ Form::radio('yatak', '3', $newfriends->yatak == 3, (old('yatak') == '3'), array('id'=>'3')) }}
                                    <hr>
                                </div>
                                {{ Form::label('gardorap', 'Gardorap') }}
                                {{ Form::hidden('gardorap', 0) }}
                                {{ Form::checkbox('gardorap',1,$newfriends->gardorap == 1, array('id'=>'gardorap')) }}
                                {{ Form::label('komidin', 'Şifonyer / Komidin') }}
                                {{ Form::hidden('komidin', 0) }}
                                {{ Form::checkbox('komidin',1,$newfriends->komidin == 1, array('id'=>'komidin')) }}
                                {{ Form::label('hali', 'Halı') }}
                                {{ Form::hidden('hali', 0) }}
                                {{ Form::checkbox('hali',1,$newfriends->hali == 1, array('id'=>'hali')) }}
                                {{ Form::label('perde', 'Perde') }}
                                {{ Form::hidden('perde', 0) }}
                                {{ Form::checkbox('perde',1,$newfriends->perde == 1, array('id'=>'perde')) }}
                                <hr>

                                {{ Form::label('calisma_masasi', 'Çalışma masası') }}
                                {{ Form::hidden('calisma_masasi', 0) }}
                                {{ Form::checkbox('calisma_masasi',1,$newfriends->calisma_masasi == 1, array('id'=>'calisma_masasi')) }}
                                {{ Form::label('sandalye', 'Çalışma masası için sandaye(Ofis vs.)') }}
                                {{ Form::hidden('sandalye', 0) }}
                                {{ Form::checkbox('sandalye',1,$newfriends->sandalye == 1, array('id'=>'sandalye')) }}
                                {{ Form::label('lamba', 'Masa lambası') }}
                                {{ Form::hidden('lamba', 0) }}
                                {{ Form::checkbox('lamba',1,$newfriends->lamba == 1, array('id'=>'lamba')) }}
                                {{ Form::label('kitaplik', 'Kitaplık') }}
                                {{ Form::hidden('kitaplik', 0) }}
                                {{ Form::checkbox('kitaplik',1,$newfriends->kitaplik == 1, array('id'=>'kitaplik')) }}
                                <hr>

                                {{ Form::label('ekstra_isitici', 'Ekstra ısıtıcılar(elektrikli ısıtıcılar vs)') }}
                                {{ Form::hidden('ekstra_isitici', 0) }}
                                {{ Form::checkbox('ekstra_isitici',1,$newfriends->ekstra_isitici == 1, array('id'=>'ekstra_isitici')) }}
                                <br>
                                {{ Form::label('ekstra_sogutucu', 'Ekstra soğutucular(vantilatör, klima vs)') }}
                                {{ Form::hidden('ekstra_sogutucu', 0) }}
                                {{ Form::checkbox('ekstra_sogutucu',1,$newfriends->ekstra_sogutucu == 1, array('id'=>'ekstra_sogutucu')) }}

                            </li>
                        </ul>
                    </div>
                    <h3>Ev ve Bina Bilgileri</h3>
                    <div>
                        <div class="form-group {{ $errors->has('evde_kalan') ? 'has-error' : '' }} ">
                            <input type="number" min="0" name="evde_kalan" hint="evde_kalan" placeholder="Evde kalan sayısı" value="{{ old('evde_kalan', $newfriends->evde_kalan)}}">
                        </div>
                        <div class="form-group {{ $errors->has('oda_sayisi') ? 'has-error' : '' }} ">
                            <input type="number" min="0" name="oda_sayisi" hint="oda_sayisi" placeholder="Oda sayısı" value="{{ old('oda_sayisi', $newfriends->oda_sayisi)}}">
                        </div>
                        <div class="form-group {{ $errors->has('isinma_cesidi') ? 'has-error' : '' }} ">
                            <input type="text" name="isinma_cesidi" hint="isinma_cesidi" placeholder="Isınma ceşidi(kombi,merkezi ısıtma vs)" value="{{ old('isinma_cesidi', $newfriends->isinma_cesidi)}}">
                        </div>
                        <hr>
                        {{ Form::label('oturma_odasi', 'Oturma odası var mı?') }}
                        {{ Form::hidden('oturma_odasi', 0) }}
                        {{ Form::checkbox('oturma_odasi',1,$newfriends->oturma_odasi == 1, array('id'=>'oturma_odasi')) }}
                        {{ Form::label('beyaz_esya', 'Beyaz eşya var mı?') }}
                        {{ Form::hidden('beyaz_esya', 0) }}
                        {{ Form::checkbox('beyaz_esya',1,$newfriends->beyaz_esya == 1, array('id'=>'beyaz_esya')) }}
                        {{ Form::label('mutfak_esya', 'Mutfak Eşyası var mı?') }}
                        {{ Form::hidden('mutfak_esya', 0) }}
                        {{ Form::checkbox('mutfak_esya',1,$newfriends->mutfak_esya == 1, array('id'=>'mutfak_esya')) }}
                        {{ Form::label('televizyon', 'Televizyon var mı? ') }}
                        {{ Form::hidden('televizyon', 0) }}
                        {{ Form::checkbox('televizyon',1,$newfriends->televizyon == 1, array('id'=>'televizyon')) }}
                        <hr>
                        {{ Form::label('alaturka', 'Alaturka tuvalet') }}
                        {{ Form::radio('tuvalet', '1', $newfriends->tuvalet == 1, (old('tuvalet') == '1'), array('id'=>'1')) }}
                        {{ Form::label('alafranga', 'Alafranga tuvalet') }}
                        {{ Form::radio('tuvalet', '2', $newfriends->tuvalet == 2, (old('tuvalet') == '2'), array('id'=>'2')) }}
                        {{ Form::label('iki_tuvalet', 'İki tuvaletten de var') }}
                        {{ Form::radio('tuvalet', '3', $newfriends->tuvalet == 3, (old('tuvalet') == '3'), array('id'=>'3')) }}
                        <hr>
                        <div class="form-group {{ $errors->has('bina_yasi') ? 'has-error' : '' }} ">
                            <input type="number" min="0" name="bina_yasi" hint="bina_yasi" placeholder="Tahmini bina yaşı" value="{{ old('bina_yasi', $newfriends->bina_yasi)}}">
                        </div>
                        <div class="form-group {{ $errors->has('evin_kati') ? 'has-error' : '' }} ">
                            <input type="number" name="evin_kati" hint="evin_kati" placeholder="Evin katı" value="{{ old('evin_kati', $newfriends->evin_kati)}}">
                        </div>
                        {{ Form::label('daire', 'Daire') }}
                        {{ Form::radio('ev', '1', $newfriends->ev == 1, (old('ev') == '1'), array('id'=>'1')) }}
                        {{ Form::label('mustakil ev', 'Müstakil ev') }}
                        {{ Form::radio('ev', '2', $newfriends->ev == 2, (old('ev') == '2'), array('id'=>'2')) }}
                        <hr>
                        <h4>Evin Cephesi</h4>
                        <br>
                        {{ Form::label('dogu', 'Doğu') }}
                        {{ Form::radio('cephe', '1', $newfriends->cephe == 1, (old('cephe') == '1'), array('id'=>'1')) }}
                        {{ Form::label('bati', 'Batı') }}
                        {{ Form::radio('cephe', '2', $newfriends->cephe == 2, (old('cephe') == '2'), array('id'=>'2')) }}
                        {{ Form::label('guney', 'Güney') }}
                        {{ Form::radio('cephe', '3', $newfriends->cephe == 3, (old('cephe') == '3'), array('id'=>'3')) }}
                        {{ Form::label('kuzey', 'Kuzey') }}
                        {{ Form::radio('cephe', '4', $newfriends->cephe == 4, (old('cephe') == '4'), array('id'=>'4')) }}
                        <hr>
                    </div>
                    <h3>Ayrıntılar</h3>
                    <div>
                        {{ Form::label('hayvan', 'Evde hayvan var mı? ') }}
                        {{ Form::hidden('hayvan', 0) }}
                        {{ Form::checkbox('hayvan',1,$newfriends->hayvan == 1, array('id'=>'hayvan')) }}
                        {{ Form::label('sigara', 'Sigara içiliyor mu? ') }}
                        {{ Form::hidden('sigara', 0) }}
                        {{ Form::checkbox('sigara',1,$newfriends->sigara == 1, array('id'=>'sigara')) }}
                        {{ Form::label('alkol', 'Alkol kullanılıyor mu? ') }}
                        {{ Form::hidden('alkol', 0) }}
                        {{ Form::checkbox('alkol',1,$newfriends->alkol == 1, array('id'=>'alkol')) }}
                        {{ Form::label('kalabalik', 'Eve gelen giden çok olur mu? ') }}
                        {{ Form::hidden('kalabalik', 0) }}
                        {{ Form::checkbox('kalabalik',1,$newfriends->kalabalik == 1, array('id'=>'kalabalik')) }}
                        <hr>
                        {{ Form::label('site', 'Site içi mi? ') }}
                        {{ Form::hidden('site', 0) }}
                        {{ Form::checkbox('site',1,$newfriends->site == 1, array('id'=>'site')) }}
                        <hr>
                        {{ Form::label('gorevli', 'Görevli var mı? ') }}
                        {{ Form::hidden('gorevli', 0) }}
                        {{ Form::checkbox('gorevli',1,$newfriends->gorevli == 1, array('id'=>'gorevli')) }}
                        <hr>
                        {{ Form::label('guvenlik', 'Güvenlik var mı? ') }}
                        {{ Form::hidden('guvenlik', 0) }}
                        {{ Form::checkbox('guvenlik',1,$newfriends->guvenlik == 1, array('id'=>'guvenlik')) }}
                        <hr>
                        {{ Form::label('otopark', 'Otopark var mı? ') }}
                        {{ Form::hidden('otopark', 0) }}
                        {{ Form::checkbox('otopark',1,$newfriends->otopark == 1, array('id'=>'otopark')) }}
                        <hr>
                        {{ Form::label('asansor', 'Asansör var mı? ') }}
                        {{ Form::hidden('asansor', 0) }}
                        {{ Form::checkbox('asansor',1,$newfriends->asansor == 1, array('id'=>'asansor')) }}
                    </div>
                    <h3>Resimler</h3>
                </div>

                <div class="form-group">
                    <button class="btn btn-default">Kaydet</button>
                    <a href="{{ route('newFriendPics',['slug' => str_slug($newfriends->baslik)]) }}" class="btn btn-default">Resim</a>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Geri</a>
                </div>
            </form>
        </div>
    </div>
@stop