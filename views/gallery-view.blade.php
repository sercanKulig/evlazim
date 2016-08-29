@extends('layouts.master')

@section('title')
    My
@endsection

@section('content')

    @include('layouts._flash')
    <div class="row">
        <div class="col-md-12">
            <h1> {{ $gallery->name }} </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="gallery-images">
                <ul>
                    @foreach($gallery->images as $image)
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
            <form action="{{ url('image/do-upload') }}" class="dropzone" id="addImages" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('gallery/list') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

@stop