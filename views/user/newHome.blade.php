@extends('layouts.master')

@section('title')
    Giriş Ekranı
@endsection

@section('content')

    @include('layouts._flash')

    <div class="col-md-2 col-md-offset-2">
        <div class="container">
            {{ Form::open(array('action' => 'userPageController@newHomeRun', 'files' => true)) }}
            <div id="accordion">
                <h3>Genel Bilgi</h3>
                <div>
                    {{ Form::hidden('cesit', 'Ev Arıyor') }}
                    <div class="form-group {{ $errors->has('baslik') ? 'has-error' : '' }} ">
                        <input type="text" name="baslik" hint="baslik" placeholder="Başlık" value="{{ old('baslik')}}">
                    </div>
                    <hr>
                    <div class="form-group {{ $errors->has('fiyat') ? 'has-error' : '' }} ">
                        <input type="number" min="0" name="fiyat" hint="fiyat" placeholder="Aylık size düşecek kira gideri beklentiniz" value="{{ old('fiyat')}}">
                    </div>
                    <hr>
                    <div class="form-group {{ $errors->has('ayrinti') ? 'has-error' : '' }} ">
                        <textarea name="ayrinti" cols="30" rows="10" placeholder="Kendiniz ve beklentilerinizden bahseder misiniz?">{{ old('ayrinti')}}</textarea>
                    </div>
                    <hr>
                    <h4>Kiminle eve çıkmak istersiniz?</h4>
                    {{ Form::label('ogrenci', 'Öğrenci') }}
                    {{ Form::radio('kiralar_misin', '1') }}
                    {{ Form::label('calisan', 'Çalışan') }}
                    {{ Form::radio('kiralar_misin', '2') }}
                    {{ Form::label('farketmez', 'Farketmez') }}
                    {{ Form::radio('kiralar_misin', '3') }}
                </div>
                <h3>Adres</h3>
                <div>
                    <ul>
                        <li>
                            <h4>Ev aradığınız muhit</h4>
                            <div class="form-group {{ $errors->has('sehir') ? 'has-error' : '' }} ">
                                <input type="text" name="sehir" hint="sehir" placeholder="* Şehir" value="{{ old('sehir')}}">
                            </div>
                            <div class="form-group {{ $errors->has('ilce') ? 'has-error' : '' }} ">
                                <input type="text" name="ilce" hint="ilce" placeholder="* İlçe" value="{{ old('ilce')}}">
                            </div>
                            <div class="form-group {{ $errors->has('semt') ? 'has-error' : '' }} ">
                                <input type="text" name="semt" hint="semt" placeholder="* Semt" value="{{ old('semt')}}">
                            </div>

                            <div class="form-group {{ $errors->has('aciklama') ? 'has-error' : '' }} ">
                                <textarea name="aciklama" cols="30" rows="10" placeholder="Eklemek istedikleriniz">{{ old('aciklama')}}</textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <h3>Ev Bilgileri</h3>
                <div>
                    <ul>
                        <li>
                            {{ Form::label('daire', 'Daire') }}
                            {{ Form::radio('ev', '1') }}
                            {{ Form::label('mustakil', 'Müstakil') }}
                            {{ Form::radio('ev', '2') }}
                            <hr>
                            {{ Form::label('boş', 'Boş') }}
                            {{ Form::radio('esyali', '1') }}
                            {{ Form::label('esyali', 'Esyali') }}
                            {{ Form::radio('esyali', '2') }}
                            <hr>
                            <div class="form-group {{ $errors->has('oda_sayisi') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="oda_sayisi" hint="oda_sayisi" placeholder="Oda Sayisi" value="{{ old('oda_sayisi')}}">
                            </div>
                            <hr>
                            <div class="form-group {{ $errors->has('kat') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="kat" hint="kat" placeholder="Evin bulunduğu kat" value="{{ old('kat')}}">
                            </div>
                            <hr>
                            <div class="form-group {{ $errors->has('yas') ? 'has-error' : '' }} ">
                                <input type="number" min="0" name="yas" hint="yas" placeholder="Bulmak istediğiniz binanın yaşı" value="{{ old('yas')}}">
                            </div>
                            <hr>
                            <div class="form-group {{ $errors->has('isitma') ? 'has-error' : '' }} ">
                                <input type="text" name="isitma" hint="isitma" placeholder="Isıtma çeşidi" value="{{ old('isitma')}}">
                            </div>

                        </li>
                    </ul>
                </div>
                <h3>Ayrıntılar</h3>
                <div>
                    <h4>Evin Cephesi</h4>
                    {{ Form::label('dogu', 'Doğu') }}
                    {{ Form::radio('cephe', '1') }}
                    {{ Form::label('bati', 'Batı') }}
                    {{ Form::radio('cephe', '2') }}
                    {{ Form::label('guney', 'Güney') }}
                    {{ Form::radio('cephe', '3') }}
                    {{ Form::label('kuzey', 'Kuzey') }}
                    {{ Form::radio('cephe', '4') }}
                    <hr>
                    <h4>Çevredikiler</h4>
                    {{ Form::label('universite', 'Üniversite') }}
                    {{ Form::checkbox('universite', 1) }}
                    {{ Form::label('sehir_merkezi', 'Şehir merkezi') }}
                    {{ Form::checkbox('sehir_merkezi', 1) }}
                    {{ Form::label('market', 'Market') }}
                    {{ Form::checkbox('market', 1) }}
                    {{ Form::label('saglik_ocagi', 'Sağlık ocağı') }}
                    {{ Form::checkbox('saglik_ocagi', 1) }}
                    {{ Form::label('eczane', 'Eczane') }}
                    {{ Form::checkbox('eczane', 1) }}
                    <br>
                    {{ Form::label('eglence', 'Eğlence Merkezleri') }}
                    {{ Form::checkbox('eglence', 1) }}
                    {{ Form::label('pazar', 'Pazar') }}
                    {{ Form::checkbox('pazar', 1) }}
                    {{ Form::label('cami', 'Cami') }}
                    {{ Form::checkbox('cami', 1) }}
                    {{ Form::label('spor_salonu', 'Spor salonu') }}
                    {{ Form::checkbox('spor_salonu', 1) }}
                    {{ Form::label('park', 'Park') }}
                    {{ Form::checkbox('park', 1) }}
                    <hr>
                    <h4>Ulaşım</h4>
                    {{ Form::label('anayol', 'Anayol') }}
                    {{ Form::checkbox('anayol', 1) }}
                    {{ Form::label('cadde', 'Cadde') }}
                    {{ Form::checkbox('cadde', 1) }}
                    {{ Form::label('otobüs', 'Otobüs') }}
                    {{ Form::checkbox('otobüs', 1) }}
                    {{ Form::label('dolmuş', 'Dolmuş') }}
                    {{ Form::checkbox('dolmuş', 1) }}
                    {{ Form::label('metro', 'Metro') }}
                    {{ Form::checkbox('metro', 1) }}
                    <br>
                    {{ Form::label('tren', 'Tren') }}
                    {{ Form::checkbox('tren', 1) }}
                    {{ Form::label('metrobüs', 'Metrobüs') }}
                    {{ Form::checkbox('metrobüs', 1) }}
                    {{ Form::label('iskele', 'İskele') }}
                    {{ Form::checkbox('iskele', 1) }}
                    {{ Form::label('minibüs', 'Minibüs') }}
                    {{ Form::checkbox('minibüs', 1) }}
                    {{ Form::label('teleferik', 'Teleferik') }}
                    {{ Form::checkbox('teleferik', 1) }}
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