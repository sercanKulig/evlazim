@extends('layouts.master')

@section('title')
    Ev Lazım - Liste
@endsection

@section('content')

    @include('layouts._flash')

    <div class="col-md-2 col-md-offset-2">
        <div class="container">
            <form action="{{ action('userPageController@editHomeRun', str_slug($newhouses->baslik)) }}" method="Post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $newhouses->id }}">
                <div id="accordion">
                    <h3>Genel Bilgi</h3>
                    <div>
                        <div class="form-group {{ $errors->has('baslik') ? 'has-error' : '' }} ">
                            <input type="text" name="baslik" hint="baslik" placeholder="Başlık" value="{{ old('baslik', $newhouses->baslik)}}">
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('fiyat') ? 'has-error' : '' }} ">
                            <input type="text" name="fiyat" hint="fiyat" placeholder="Fiyat" value="{{ old('fiyat', $newhouses->fiyat)}}">
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('ayrinti') ? 'has-error' : '' }} ">
                            <textarea name="ayrinti" cols="30" rows="10" placeholder="Eklemek istedikleriniz">{{ old('ayrinti', $newhouses->ayrinti)}}</textarea>
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('kiralar_misin') ? 'has-error' : '' }} ">
                            <h4>Kiminle eve çıkmak istersiniz?</h4>
                            {{ Form::label('ogrenci', 'Öğrenci') }}
                            {{ Form::radio('kiralar_misin', '1', $newhouses->kiralar_misin == 1, (old('kiralar_misin') == '1'), array('id'=>'1')) }}
                            {{ Form::label('calisan', 'Çalışan') }}
                            {{ Form::radio('kiralar_misin', '2', $newhouses->kiralar_misin == 2, (old('kiralar_misin') == '2'), array('id'=>'2')) }}
                            {{ Form::label('farketmez', 'Farketmez') }}
                            {{ Form::radio('kiralar_misin', '3', $newhouses->kiralar_misin == 3, (old('kiralar_misin') == '3'), array('id'=>'3')) }}
                        </div>
                    </div>
                    <h3>Adres</h3>
                    <div>
                        <ul>
                            <li>
                                <div class="form-group {{ $errors->has('sehir') ? 'has-error' : '' }} ">
                                    <input type="text" name="sehir" hint="sehir" placeholder="* Şehir" value="{{ old('sehir', $newhouses->sehir)}}">
                                </div>
                                <div class="form-group {{ $errors->has('ilce') ? 'has-error' : '' }} ">
                                    <input type="text" name="ilce" hint="ilce" placeholder="* İlçe" value="{{ old('ilce', $newhouses->ilce)}}">
                                </div>
                                <div class="form-group {{ $errors->has('semt') ? 'has-error' : '' }} ">
                                    <input type="text" name="semt" hint="semt" placeholder="* Semt" value="{{ old('semt', $newhouses->semt)}}">
                                </div>
                                <div class="form-group {{ $errors->has('aciklama') ? 'has-error' : '' }} ">
                                    <textarea name="aciklama" cols="30" rows="10" placeholder="Eklemek istedikleriniz">{{ old('aciklama', $newhouses->aciklama)}}</textarea>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3>Ev Bilgileri</h3>
                    <div>
                        <ul>
                            <li>
                                {{ Form::label('daire', 'Daire') }}
                                {{ Form::radio('ev', '1', $newhouses->ev == 1, (old('ev') == '1'), array('id'=>'1')) }}
                                {{ Form::label('mustakil', 'Müstakil') }}
                                {{ Form::radio('ev', '2', $newhouses->ev == 2, (old('ev') == '2'), array('id'=>'2')) }}
                                <hr>

                                {{ Form::label('boş', 'Boş') }}
                                {{ Form::radio('esyali', '1', $newhouses->esyali == 1, (old('esyali') == '1'), array('id'=>'1')) }}
                                {{ Form::label('esyali', 'Esyali') }}
                                {{ Form::radio('esyali', '2', $newhouses->esyali == 2, (old('esyali') == '2'), array('id'=>'2')) }}
                                <hr>

                                <div class="form-group {{ $errors->has('oda_sayisi') ? 'has-error' : '' }} ">
                                    <input type="number" min="0" name="oda_sayisi" hint="oda_sayisi" placeholder="Oda sayısı" value="{{ old('oda_sayisi', $newhouses->oda_sayisi)}}">
                                </div>
                                <div class="form-group {{ $errors->has('kat') ? 'has-error' : '' }} ">
                                    <input type="number" min="0" name="kat" hint="kat" placeholder="Evin bulunduğu kat" value="{{ old('kat', $newhouses->kat)}}">
                                </div>
                                <div class="form-group {{ $errors->has('yas') ? 'has-error' : '' }} ">
                                    <input type="number" min="0" name="yas" hint="yas" placeholder="Tahmini bina yaşı" value="{{ old('yas', $newhouses->yas)}}">
                                </div>
                                <div class="form-group {{ $errors->has('isitma') ? 'has-error' : '' }} ">
                                    <input type="text" name="isitma" hint="isitma" placeholder="Isıtma ceşidi" value="{{ old('isitma', $newhouses->isitma)}}">
                                </div>

                            </li>
                        </ul>
                    </div>
                    <h3>Ayrıntı</h3>
                    <div>
                        <h4>Evin Cephesi</h4>
                        {{ Form::label('dogu', 'Doğu') }}
                        {{ Form::radio('cephe', '1', $newhouses->cephe == 1, (old('cephe') == '1'), array('id'=>'1')) }}
                        {{ Form::label('bati', 'Batı') }}
                        {{ Form::radio('cephe', '2', $newhouses->cephe == 2, (old('cephe') == '2'), array('id'=>'2')) }}
                        {{ Form::label('guney', 'Güney') }}
                        {{ Form::radio('cephe', '3', $newhouses->cephe == 3, (old('cephe') == '3'), array('id'=>'3')) }}
                        {{ Form::label('kuzey', 'Kuzey') }}
                        {{ Form::radio('cephe', '4', $newhouses->cephe == 4, (old('cephe') == '4'), array('id'=>'4')) }}
                        <hr>
                        <h4>Çevredikiler</h4>
                        {{ Form::label('universite', 'Üniversite ') }}
                        {{ Form::checkbox('universite',null,$newhouses->universite == 1, array('id'=>'universite')) }}
                        {{ Form::label('sehir_merkezi', 'Şehir merkezi') }}
                        {{ Form::checkbox('sehir_merkezi',null,$newhouses->bati == 2, array('id'=>'sehir_merkezi')) }}
                        {{ Form::label('market', 'Market ') }}
                        {{ Form::checkbox('market',null,$newhouses->market == 1, array('id'=>'market')) }}
                        {{ Form::label('saglik_ocagi', 'Sağlık ocağı ') }}
                        {{ Form::checkbox('saglik_ocagi',null,$newhouses->saglik_ocagi == 1, array('id'=>'saglik_ocagi')) }}
                        {{ Form::label('eczane', 'Eczane ') }}
                        {{ Form::checkbox('eczane',null,$newhouses->eczane == 1, array('id'=>'eczane')) }}
                        <hr>
                        {{ Form::label('eglence', 'Eğlence Merkezleri ') }}
                        {{ Form::checkbox('eglence',null,$newhouses->eglence == 1, array('id'=>'eglence')) }}
                        {{ Form::label('pazar', 'Pazar') }}
                        {{ Form::checkbox('pazar',null,$newhouses->pazar == 2, array('id'=>'pazar')) }}
                        {{ Form::label('cami', 'Cami ') }}
                        {{ Form::checkbox('cami',null,$newhouses->cami == 1, array('id'=>'cami')) }}
                        {{ Form::label('spor_salonu', 'Spor salonu ') }}
                        {{ Form::checkbox('spor_salonu',null,$newhouses->spor_salonu == 1, array('id'=>'spor_salonu')) }}
                        {{ Form::label('park', 'Park ') }}
                        {{ Form::checkbox('park',null,$newhouses->park == 1, array('id'=>'park')) }}
                        <hr>
                        <h4>Çevredikiler</h4>
                        {{ Form::label('anayol', 'Anayol ') }}
                        {{ Form::checkbox('anayol',null,$newhouses->anayol == 1, array('id'=>'anayol')) }}
                        {{ Form::label('cadde', 'Cadde ') }}
                        {{ Form::checkbox('cadde',null,$newhouses->cadde == 2, array('id'=>'cadde')) }}
                        {{ Form::label('otobüs', 'Otobüs ') }}
                        {{ Form::checkbox('otobüs',null,$newhouses->otobüs == 1, array('id'=>'otobüs')) }}
                        {{ Form::label('dolmuş', 'Dolmuş ') }}
                        {{ Form::checkbox('dolmuş',null,$newhouses->dolmuş == 1, array('id'=>'dolmuş')) }}
                        {{ Form::label('metro', 'Metro ') }}
                        {{ Form::checkbox('metro',null,$newhouses->metro == 1, array('id'=>'metro')) }}
                        <hr>
                        {{ Form::label('tren', 'Tren ') }}
                        {{ Form::checkbox('tren',null,$newhouses->tren == 1, array('id'=>'tren')) }}
                        {{ Form::label('metrobüs', 'Metrobüs') }}
                        {{ Form::checkbox('metrobüs',null,$newhouses->metrobüs == 2, array('id'=>'metrobüs')) }}
                        {{ Form::label('iskele', 'İskele ') }}
                        {{ Form::checkbox('iskele',null,$newhouses->iskele == 1, array('id'=>'iskele')) }}
                        {{ Form::label('minibüs', 'Minibüs ') }}
                        {{ Form::checkbox('minibüs',null,$newhouses->minibüs == 1, array('id'=>'minibüs')) }}
                        {{ Form::label('teleferik', 'Teleferik ') }}
                        {{ Form::checkbox('teleferik',null,$newhouses->teleferik == 1, array('id'=>'teleferik')) }}
                    </div>
                    <h3>Resimler</h3>
                </div>
                <div class="form-group">
                    <button class="btn btn-default">Kaydet</button>
                    <a href="{{ route('newHomePics',['slug' => str_slug($newhouses->baslik)]) }}" class="btn btn-default">Resim</a>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Geri</a>
                </div>
            </form>
        </div>
    </div>
@stop