@extends('layouts.master')

@section('title')
    Ev Lazım - Liste
@endsection

@section('content')

    <div class="container">
        @include('layouts/_flash')
        <h2><a href="{{ route('newFriend') }}">Ev arkadaşı bulsam</a> - <a href="{{ route('newHome') }}">Ev bulsam</a> - <a href="{{ route('newRent') }}">Evime kiracı bulsam</a> - <a href="">Eşyalarımı Devretsem</a> </h2>
    </div>
@stop