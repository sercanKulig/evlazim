@extends('layouts.master')

@section('title')
    Kayıt Ekranı
@endsection

@section('content')

    @include('layouts._flash')

        <div class="row new-post">
            <div class="col-md-2 col-md-offset-5">
                <form action="{{ action('userPageController@editUserPassRun') }}" method="Post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">
                        <label for="password"></label>
                        <input class="form-control" type="password" placeholder="Şifre" name="password" id="password">
                    </div>
                    <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }} ">
                        <label for="new_password"></label>
                        <input class="form-control" type="password" placeholder="Yeni Şifre" name="new_password" id="new_password">
                    </div>
                    <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }} ">
                        <label for="new_password_confirmation"></label>
                        <input class="form-control" type="password" placeholder="Yeni Şifre (tekrar)" name="new_password_confirmation" id="new_password_confirmation" >
                    </div>
                    <button type="submit" class="btn btn-primary">Gönder</button>
                </form>
            </div>
        </div>

@stop