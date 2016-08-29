@extends('layouts.master')

@section('title')
    My
@endsection

@section('content')

    @include('layouts._flash')

   <div class="row">
       <div class="col-md-12">
           <h1> My Gallery </h1>
       </div>
   </div>


    <div class="row">
        <div class="col-md-8">
            @if ($galleries->count()>0)
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr class="label-info">
                        <th>Name of the gallery</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($galleries as $gallery)
                    <tr>
                        <td>{{$gallery->name}}
                        <span class="pull-right">
                            {{ $gallery->images()->count() }}
                        </span>
                        </td>
                        <td><a href="{{ url('gallery/view/'. $gallery->id) }}">View</a>/<a href="{{ url('gallery/delete/'. $gallery->id) }}">Delete</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <form class="form" method="post" action="{{ url('gallery/save') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

           <div class="form-group">
               <input type="text" name="gallery_name" id="gallery_name" placeholder=" Name of the gallery" class="form-control">
           </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@stop