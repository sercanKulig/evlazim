@extends('layouts.master')

@section('title')
    Ev Lazım - Liste
@endsection

@section('content')

    <div class="container">
        @include('layouts/_flash')
        <h2><a href="">Mesajlarım</a> - <a href="{{ route('contentSelect') }}">Bir mazuratım vardı</a> - <a href="{{ route('editUser') }}">Bilgilerime bir bakayım</a> </h2>
        <hr>
        @if(! $newfriends->isEmpty() || !$newhouses->isEmpty() || !$newrents->isEmpty())
            @foreach($newfriends as $newfriend)
                <div class="panel">
                    <div class="info">
                        {{ $newfriend->baslik }} <br>
                        {{ $newfriend->user->adSoyad }} , {{ $newfriend->created_at }}<br>
                        <a href="{{ route('editFriend',['slug' => str_slug($newfriend->baslik)]) }}">Düzenle</a> - <a href="{{ route('post.friend', ['post_id' => $newfriend->id]) }}">Sil</a>
                    </div>
                </div>
            @endforeach
            @foreach($newrents as $newrent)
                <div class="panel">
                     <div class="info">
                         {{ $newrent->baslik }} <br>
                         {{ $newrent->user->adSoyad }} , {{ $newrent->created_at }}<br>
                         <a href="{{ route('editRent',['slug' => str_slug($newrent->baslik)]) }}">Düzenle</a> - <a href="{{ route('post.rent', ['post_id' => $newrent->id]) }}">Sil</a>
                     </div>
                </div>
            @endforeach
            @foreach($newhouses as $newhouse)
                <div class="panel">
                    <div class="info">
                            {{ $newhouse->baslik }} <br>
                            {{ $newhouse->user->adSoyad }} , {{ $newhouse->created_at }}<br>
                            <a href="{{ route('editHome',['slug' => str_slug($newhouse->baslik)]) }}">Düzenle</a> - <a href="{{ route('post.home', ['post_id' => $newhouse->id]) }}">Sil</a>
                     </div>
                </div>
            @endforeach
        @else
            <div class="alert alert warning"> Henüz makale eklenmedi!</div>
        @endif
    </div>
@stop