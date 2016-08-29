@extends('layouts.master')

@section('title')
    Kayıt Ekranı
@endsection

@section('content')

    @include('layouts._flash')

        <div class="row new-post">
            <div class="col-md-2 col-md-offset-5">
                <form action="{{ action('userPageController@editUserInfoRun') }}" method="Post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group {{ $errors->has('adSoyad') ? 'has-error' : '' }} ">
                        <label for="adSoyad"></label>
                        <input class="form-control" type="text" placeholder="Ad ve Soyad" name="adSoyad" id="adSoyad"  value="{{ old('adSoyad')}}"} >
                    </div>
                    <div class="form-group {{ $errors->has('dogumTarihi') ? 'has-error' : '' }}  col-md-offset-4 ">
                        {{ Form::selectYear('dogumTarihi', 1970, 2016) }}
                    </div>
                    <div class="form-group {{ $errors->has('cinsiyet') ? 'has-error' : '' }} col-md-offset-4 ">
                        {{ Form::select('cinsiyet', [
                           'Kadın' => 'Kadın',
                           'Erkek' => 'Erkek']
                        ) }}
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                        <label for="email"></label>
                        <input class="form-control" type="text" placeholder="Email" name="email" id="email" value="{{ old('email')}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </div>
                </form>
            </div>
        </div>

@stop