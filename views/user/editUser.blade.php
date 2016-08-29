@extends('layouts.master')

@section('title')
    Ev Lazım - Liste
@endsection

@section('content')
    @include('layouts._flash')

    <div class="row new-post">
        <div class="col-md-3 col-md-offset-4">
            <h2><a href="{{ route('editUserInfo') }}">Bilgi Değişikliği</a> - <a href="{{ route('editUserPass') }}">Şifre Değişikliği</a></h2>
        </div>
    </div>
@stop