@extends('layouts.master')

@section('title')
    Ev Lazım - Liste
@endsection

@section('content')

    @include('layouts._flash')

    <div class="col-md-2 col-md-offset-2">
        <div class="container">
            <form action="{{ action('userPageController@editRentRun', $newrents->id) }}" method="Post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{ $newrents->id }}">
                <div id="accordion">
                    <h3>Genel Bilgi</h3>
                    <div>
                        <div class="form-group {{ $errors->has('baslik') ? 'has-error' : '' }} ">
                            <input type="text" name="baslik" hint="baslik" placeholder="Başlık" value="{{ old('baslik', $newrents->baslik)}}">
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('fiyat') ? 'has-error' : '' }} ">
                            <input type="text" name="fiyat" hint="fiyat" placeholder="Fiyat" value="{{ old('fiyat', $newrents->fiyat)}}">
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('ayrinti') ? 'has-error' : '' }} ">
                            <textarea name="ayrinti" cols="30" rows="10" placeholder="Eklemek istedikleriniz">{{ old('ayrinti', $newrents->ayrinti)}}</textarea>
                        </div>
                        <hr>
                        <div class="form-group {{ $errors->has('kiralar_misin') ? 'has-error' : '' }} ">
                            <h4>Evinizi öğrenciye kiralar mısınız?</h4>
                            {{ Form::label('evet', 'Evet') }}
                            {{ Form::radio('kiralar_misin', '1', $newrents->kiralar_misin == 1, (old('kiralar_misin') == '1'), array('id'=>'1')) }}
                            {{ Form::label('hayır', 'Hayır') }}
                            {{ Form::radio('kiralar_misin', '2', $newrents->kiralar_misin == 2, (old('kiralar_misin') == '2'), array('id'=>'2')) }}
                        </div>
                    </div>
                    <h3>Adres</h3>
                    <div>
                        <ul>
                            <li>
                                <div class="form-group {{ $errors->has('sehir') ? 'has-error' : '' }} ">
                                    <input type="text" name="sehir" hint="sehir" placeholder="* Şehir" value="{{ old('sehir', $newrents->sehir)}}">
                                </div>
                                <div class="form-group {{ $errors->has('ilce') ? 'has-error' : '' }} ">
                                    <input type="text" name="ilce" hint="ilce" placeholder="* İlçe" value="{{ old('ilce', $newrents->ilce)}}">
                                </div>

                                <div class="form-group {{ $errors->has('acik_adres') ? 'has-error' : '' }} ">
                                    <textarea name="acik_adres" cols="30" rows="10" placeholder="*  Açık Adresiniz">{{ old('ayrinti', $newrents->acik_adres)}}</textarea>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3>Ev Bilgileri</h3>
                    <div>
                        <ul>
                            <li>
                                {{ Form::label('daire', 'Daire') }}
                                {{ Form::radio('ev', '1', $newrents->ev == 1, (old('ev') == '1'), array('id'=>'1')) }}
                                {{ Form::label('mustakil', 'Müstakil') }}
                                {{ Form::radio('ev', '2', $newrents->ev == 2, (old('ev') == '2'), array('id'=>'2')) }}
                                <hr>

                                {{ Form::label('boş', 'Boş') }}
                                {{ Form::radio('esyali', '1', $newrents->esyali == 1, (old('esyali') == '1'), array('id'=>'1')) }}
                                {{ Form::label('esyali', 'Esyali') }}
                                {{ Form::radio('esyali', '2', $newrents->esyali == 2, (old('esyali') == '2'), array('id'=>'2')) }}
                                <hr>

                                {{ Form::label('boş', 'Boş') }}
                                {{ Form::radio('kullanım_durumu', '1', $newrents->kullanım_durumu == 1, (old('kullanım_durumu') == '1'), array('id'=>'1')) }}
                                {{ Form::label('kiraci_var', 'Kiracı var') }}
                                {{ Form::radio('kullanım_durumu', '2', $newrents->kullanım_durumu == 2, (old('kullanım_durumu') == '2'), array('id'=>'2')) }}
                                <hr>

                                <div class="form-group {{ $errors->has('oda_sayisi') ? 'has-error' : '' }} ">
                                    <input type="number" min="0" name="oda_sayisi" hint="oda_sayisi" placeholder="Oda sayısı" value="{{ old('oda_sayisi', $newrents->oda_sayisi)}}">
                                </div>
                                <div class="form-group {{ $errors->has('kat') ? 'has-error' : '' }} ">
                                    <input type="number" min="0" name="kat" hint="kat" placeholder="Evin bulunduğu kat" value="{{ old('kat', $newrents->kat)}}">
                                </div>
                                <div class="form-group {{ $errors->has('yas') ? 'has-error' : '' }} ">
                                    <input type="number" min="0" name="yas" hint="yas" placeholder="Tahmini bina yaşı" value="{{ old('yas', $newrents->yas)}}">
                                </div>
                                <div class="form-group {{ $errors->has('isitma') ? 'has-error' : '' }} ">
                                    <input type="text" name="isitma" hint="isitma" placeholder="Isıtma ceşidi" value="{{ old('isitma', $newrents->isitma)}}">
                                </div>

                            </li>
                        </ul>
                    </div>
                    <h3>Ayrıntı</h3>
                    <div>
                        <h4>Evin Cephesi</h4>
                        {{ Form::label('dogu', 'Doğu') }}
                        {{ Form::radio('cephe', '1', $newrents->cephe == 1, (old('cephe') == '1'), array('id'=>'1')) }}
                        {{ Form::label('bati', 'Batı') }}
                        {{ Form::radio('cephe', '2', $newrents->cephe == 2, (old('cephe') == '2'), array('id'=>'2')) }}
                        {{ Form::label('guney', 'Güney') }}
                        {{ Form::radio('cephe', '3', $newrents->cephe == 3, (old('cephe') == '3'), array('id'=>'3')) }}
                        {{ Form::label('kuzey', 'Kuzey') }}
                        {{ Form::radio('cephe', '4', $newrents->cephe == 4, (old('cephe') == '4'), array('id'=>'4')) }}
                        <hr>
                        <h4>Çevredikiler</h4>
                        {{ Form::label('universite', 'Üniversite ') }}
                        {{ Form::checkbox('universite',null,$newrents->universite == 1, array('id'=>'universite')) }}
                        {{ Form::label('sehir_merkezi', 'Şehir merkezi') }}
                        {{ Form::checkbox('sehir_merkezi',null,$newrents->bati == 2, array('id'=>'sehir_merkezi')) }}
                        {{ Form::label('market', 'Market ') }}
                        {{ Form::checkbox('market',null,$newrents->market == 1, array('id'=>'market')) }}
                        {{ Form::label('saglik_ocagi', 'Sağlık ocağı ') }}
                        {{ Form::checkbox('saglik_ocagi',null,$newrents->saglik_ocagi == 1, array('id'=>'saglik_ocagi')) }}
                        {{ Form::label('eczane', 'Eczane ') }}
                        {{ Form::checkbox('eczane',null,$newrents->eczane == 1, array('id'=>'eczane')) }}
                        <hr>
                        {{ Form::label('eglence', 'Eğlence Merkezleri ') }}
                        {{ Form::checkbox('eglence',null,$newrents->eglence == 1, array('id'=>'eglence')) }}
                        {{ Form::label('pazar', 'Pazar') }}
                        {{ Form::checkbox('pazar',null,$newrents->pazar == 2, array('id'=>'pazar')) }}
                        {{ Form::label('cami', 'Cami ') }}
                        {{ Form::checkbox('cami',null,$newrents->cami == 1, array('id'=>'cami')) }}
                        {{ Form::label('spor_salonu', 'Spor salonu ') }}
                        {{ Form::checkbox('spor_salonu',null,$newrents->spor_salonu == 1, array('id'=>'spor_salonu')) }}
                        {{ Form::label('park', 'Park ') }}
                        {{ Form::checkbox('park',null,$newrents->park == 1, array('id'=>'park')) }}
                        <hr>
                        <h4>Çevredikiler</h4>
                        {{ Form::label('anayol', 'Anayol ') }}
                        {{ Form::checkbox('anayol',null,$newrents->anayol == 1, array('id'=>'anayol')) }}
                        {{ Form::label('cadde', 'Cadde ') }}
                        {{ Form::checkbox('cadde',null,$newrents->cadde == 2, array('id'=>'cadde')) }}
                        {{ Form::label('otobüs', 'Otobüs ') }}
                        {{ Form::checkbox('otobüs',null,$newrents->otobüs == 1, array('id'=>'otobüs')) }}
                        {{ Form::label('dolmuş', 'Dolmuş ') }}
                        {{ Form::checkbox('dolmuş',null,$newrents->dolmuş == 1, array('id'=>'dolmuş')) }}
                        {{ Form::label('metro', 'Metro ') }}
                        {{ Form::checkbox('metro',null,$newrents->metro == 1, array('id'=>'metro')) }}
                        <hr>
                        {{ Form::label('tren', 'Tren ') }}
                        {{ Form::checkbox('tren',null,$newrents->tren == 1, array('id'=>'tren')) }}
                        {{ Form::label('metrobüs', 'Metrobüs') }}
                        {{ Form::checkbox('metrobüs',null,$newrents->metrobüs == 2, array('id'=>'metrobüs')) }}
                        {{ Form::label('iskele', 'İskele ') }}
                        {{ Form::checkbox('iskele',null,$newrents->iskele == 1, array('id'=>'iskele')) }}
                        {{ Form::label('minibüs', 'Minibüs ') }}
                        {{ Form::checkbox('minibüs',null,$newrents->minibüs == 1, array('id'=>'minibüs')) }}
                        {{ Form::label('teleferik', 'Teleferik ') }}
                        {{ Form::checkbox('teleferik',null,$newrents->teleferik == 1, array('id'=>'teleferik')) }}
                    </div>
                    <h3>Resimler</h3>
                </div>
                <div class="form-group">
                    <button class="btn btn-default">Kaydet</button>
                    <a href="{{ route('newRentPics',['slug' => str_slug($newrents->baslik)]) }}" class="btn btn-default">Resim</a>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Geri</a>
                </div>
            </form>
        </div>
    </div>
@stop