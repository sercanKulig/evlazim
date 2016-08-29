@extends('layouts.master')

@section('title')
    Giriş Ekranı
@endsection

@section('content')

    @include('layouts._flash')

        <div class="col-md-2 col-md-offset-2">
            <div class="container">
                {{ Form::open(array('action' => 'userPageController@newFriendRun')) }}
                    <div id="accordion">
                        <h3>Genel Bilgi</h3>
                        <div>
                            {{ Form::hidden('cesit', 'Ev Arkadaşı Arıyor') }}
                            <div class="form-group {{ $errors->has('baslik') ? 'has-error' : '' }} ">
                                <input type="text" name="baslik" hint="baslik" placeholder="Başlık" value="{{ old('baslik')}}">
                            </div>
                            <div class="form-group {{ $errors->has('fiyat') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="fiyat" hint="fiyat" placeholder="Aylık kişi başına düşen harcama" value="{{ old('fiyat')}}">
                            </div>

                            <hr>
                            <div class="form-group {{ $errors->has('cinsiyet') ? 'has-error' : '' }} ">
                                <h4>Ev arkadaşı olarak aradığınız kişi</h4><br>
                                {{ Form::label('erkek', 'Erkek') }}
                                    {{ Form::radio('cinsiyet', '1') }}
                                {{ Form::label('kadin', 'Kadın') }}
                                    {{ Form::radio('cinsiyet', '2') }}
                                {{ Form::label('farketmez', 'Farketmez') }}
                                    {{ Form::radio('cinsiyet', '3') }}
                            </div>
                            <hr>
                            <div class="form-group {{ $errors->has('neden') ? 'has-error' : '' }} ">
                                {{ Form::label('ogrenci', 'Öğrenci') }}
                                {{ Form::radio('neden', '1') }}
                                {{ Form::label('calisan', 'Çalışan') }}
                                {{ Form::radio('neden', '2') }}
                                {{ Form::label('farketmez', 'Farketmez') }}
                                {{ Form::radio('neden', '3') }}
                            </div>
                            <hr>
                            <h4>Evde Bağlı olanlar</h4>
                            <br>
                            {{ Form::label('elektrik', 'Elektirik') }}
                                {{ Form::checkbox('elektrik', 1) }}
                            {{ Form::label('su', 'Su') }}
                                {{ Form::checkbox('su', 1) }}
                            {{ Form::label('dogalgaz', 'Doğalgaz') }}
                                {{ Form::checkbox('dogalgaz', 1) }}
                            {{ Form::label('internet', 'İnternet') }}
                                {{ Form::checkbox('internet', 1) }}
                            <hr>
                            <div class="form-group {{ $errors->has('ayrinti') ? 'has-error' : '' }} ">
                                <textarea name="ayrinti" cols="30" rows="10" placeholder="Kendinizi ve evinizle ilgili eklemek istedikleriniz"  value="{{ old('ayrinti')}}"></textarea>
                            </div>
                        </div>
                        <h3>Adres</h3>
                        <div>
                            <ul>
                                <li>
                                    <div class="form-group {{ $errors->has('sehir') ? 'has-error' : '' }} ">
                                        <input type="text" name="sehir" hint="sehir" placeholder="* Şehir" value="{{ old('sehir')}}">
                                    </div>
                                    <div class="form-group {{ $errors->has('ilce') ? 'has-error' : '' }} ">
                                        <input type="text" name="ilce" hint="ilce" placeholder="* İlçe" value="{{ old('ilce')}}">
                                    </div>

                                    <div class="form-group {{ $errors->has('acik_adres') ? 'has-error' : '' }} ">
                                        <textarea name="acik_adres" cols="30" rows="10" placeholder="*  Açık Adresiniz"  value="{{ old('acik_adres')}}"></textarea>
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
                                        {{ Form::radio('yatak', '1') }}
                                    {{ Form::label('çift_yatak', 'Çift Kişilik Yatak') }}
                                        {{ Form::radio('yatak', '2') }}
                                    {{ Form::label('ranza', 'Ranza') }}
                                        {{ Form::radio('yatak', '3') }}
                                    <hr>
                                    </div>
                                    {{ Form::label('gardorap', 'Gardorap') }}
                                        {{ Form::checkbox('gardorap', 1) }}
                                    {{ Form::label('komidin', 'Şifonyer / Komidin') }}
                                        {{ Form::checkbox('komidin', 1) }}
                                    {{ Form::label('hali', 'Halı') }}
                                        {{ Form::checkbox('hali', 1) }}
                                    {{ Form::label('perde', 'Perde') }}
                                        {{ Form::checkbox('perde', 1) }}
                                    <hr>

                                    {{ Form::label('calisma_masasi', 'Çalışma masası') }}
                                        {{ Form::checkbox('calisma_masasi', 1) }}
                                    {{ Form::label('sandalye', 'Çalışma masası için sandaye(Ofis vs.)') }}
                                        {{ Form::checkbox('sandalye', 1) }}
                                    {{ Form::label('lamba', 'Masa lambası') }}
                                        {{ Form::checkbox('lamba', 1) }}
                                    {{ Form::label('kitaplik', 'Kitaplık') }}
                                        {{ Form::checkbox('kitaplik', 1) }}
                                    <hr>

                                    {{ Form::label('ekstra_isitici', 'Ekstra ısıtıcılar(elektrikli ısıtıcılar vs)') }}
                                        {{ Form::checkbox('ekstra_isitici', 1) }}
                                    <br>
                                    {{ Form::label('ekstra_sogutucu', 'Ekstra soğutucular(vantilatör, klima vs)') }}
                                        {{ Form::checkbox('ekstra_sogutucu', 1) }}

                                </li>
                            </ul>
                        </div>
                        <h3>Ev ve Bina Bilgileri</h3>
                        <div>
                            <div class="form-group {{ $errors->has('evde_kalan') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="evde_kalan" hint="evde_kalan" placeholder="Evde kalan sayısı" value="{{ old('evde_kalan')}}">
                            </div>
                            <div class="form-group {{ $errors->has('oda_sayisi') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="oda_sayisi" hint="oda_sayisi" placeholder="Oda sayısı" value="{{ old('oda_sayisi')}}">
                            </div>
                            <div class="form-group {{ $errors->has('isinma_cesidi') ? 'has-error' : '' }} ">
                                <input type="text" name="isinma_cesidi" hint="isinma_cesidi" placeholder="Isınma ceşidi(kombi,merkezi ısıtma vs)" value="{{ old('isinma_cesidi')}}">
                            </div>
                            <hr>
                            {{ Form::label('oturma_odasi', 'Oturma odası var mı?') }}
                                {{ Form::checkbox('oturma_odasi', 1) }}
                            {{ Form::label('beyaz_esya', 'Beyaz eşya var mı?') }}
                                {{ Form::checkbox('beyaz_esya', 1) }}
                            {{ Form::label('mutfak_esya', 'Mutfak Eşyası var mı?') }}
                                {{ Form::checkbox('mutfak_esya', 1) }}
                            {{ Form::label('televizyon', 'Televizyon var mı? ') }}
                                {{ Form::checkbox('televizyon', 1) }}
                            <hr>
                            {{ Form::label('alaturka', 'Alaturka tuvalet') }}
                                {{ Form::radio('tuvalet', '1') }}
                            {{ Form::label('alafranga', 'Alafranga tuvalet') }}
                                {{ Form::radio('tuvalet', '2') }}
                            {{ Form::label('iki_tuvalet', 'İki tuvaletten de var') }}
                                {{ Form::radio('tuvalet', '3') }}
                            <hr>
                            <div class="form-group {{ $errors->has('bina_yasi') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="bina_yasi" hint="bina_yasi" placeholder="Tahmini bina yaşı" value="{{ old('bina_yasi')}}">
                            </div>
                            <div class="form-group {{ $errors->has('evin_kati') ? 'has-error' : '' }} ">
                                <input type="number" name="evin_kati" hint="evin_kati" placeholder="Evin katı" value="{{ old('evin_kati')}}">
                            </div>
                            {{ Form::label('daire', 'Daire') }}
                                {{ Form::radio('ev', '1') }}
                            {{ Form::label('mustakil ev', 'Müstakil ev') }}
                                {{ Form::radio('ev', '2') }}
                            <hr>
                            <h4>Evin Cephesi</h4>
                            <br>
                            {{ Form::label('dogu', 'Doğu') }}
                                {{ Form::radio('cephe', '1') }}
                            {{ Form::label('bati', 'Batı') }}
                                {{ Form::radio('cephe', '2') }}
                            {{ Form::label('guney', 'Güney') }}
                                {{ Form::radio('cephe', '3') }}
                            {{ Form::label('kuzey', 'Kuzey') }}
                                {{ Form::radio('cephe', '4') }}
                            <hr>
                        </div>
                        <h3>Ayrıntılar</h3>
                        <div>
                            {{ Form::label('hayvan', 'Evde hayvan var mı? ') }}
                                {{ Form::checkbox('hayvan', 1) }}
                            {{ Form::label('sigara', 'Sigara içiliyor mu? ') }}
                                {{ Form::checkbox('sigara', 1) }}
                            {{ Form::label('alkol', 'Alkol kullanılıyor mu? ') }}
                                {{ Form::checkbox('alkol', 1) }}
                            {{ Form::label('kalabalik', 'Eve gelen giden çok olur mu? ') }}
                                {{ Form::checkbox('kalabalik', 1) }}
                            <hr>
                            {{ Form::label('site', 'Site içi mi? ') }}
                                {{ Form::checkbox('site', 1) }}
                            <hr>
                            {{ Form::label('gorevli', 'Görevli var mı? ') }}
                                {{ Form::checkbox('gorevli', 1) }}
                            <hr>
                            {{ Form::label('guvenlik', 'Güvenlik var mı? ') }}
                                {{ Form::checkbox('guvenlik', 1) }}
                            <hr>
                            {{ Form::label('otopark', 'Otopark var mı? ') }}
                                {{ Form::checkbox('otopark', 1) }}
                            <hr>
                            {{ Form::label('asansor', 'Asansör var mı? ') }}
                                {{ Form::checkbox('asansor', 1) }}
                        </div>
                    </div>
                <h3 class="not-ready">Resimler</h3>
                    <div class="form-group">
                        <button class="btn btn-succes">Resim ekleme</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Geri</a>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop