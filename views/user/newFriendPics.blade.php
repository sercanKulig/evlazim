@extends('layouts.master')

@section('title')
    My
@endsection

@section('content')

    @include('layouts._flash')
    <div class="row">
        <div class="col-md-12">
            <h1> {{ $newfriends->baslik }} </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="gallery-images">
                <ul>
                    @foreach($newfriends->friend_pics as $image)
                        <li>
                            <a href="{{ url($image->file_path) }}" data-lightbox="myPictures">
                                <img src="{{ url($image->file_path) }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <ul>
                <li>
                    <form action="{{ url('image/friendMain-do-uploads') }}" class="dropzone" id="addMainImages" enctype="multipart/form-data">
                        <div class="dz-message" data-dz-message><span>Anasayfa'da görünecek bir fotograf seçiniz</span></div>
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $newfriends->id }}">
                        {{ Form::hidden('main', '1') }}
                        <input type="hidden" name="slug" value="{{ str_slug($newfriends->baslik) }}">
                    </form>
                </li>
                <li>
                    <form action="{{ url('image/friend-do-uploads') }}" class="dropzone" id="addImages" enctype="multipart/form-data">
                        <div class="dz-message" data-dz-message><span>Diğer fotograf</span></div>
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $newfriends->id }}">
                        {{ Form::hidden('main', '0') }}
                        <input type="hidden" name="slug" value="{{ str_slug($newfriends->baslik) }}">
                    </form>
                </li>
            </ul>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('editFriend',['slug' => str_slug($newfriends->baslik)])}}" class="btn btn-primary">Geri</a>
            <a href="{{ route('userHome') }}" class="btn btn-primary">Bitir</a>
        </div>
    </div>

@stop