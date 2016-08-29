<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Gallery;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function viewGalleryList()
    {
        $galleries = Gallery::all();
        return view('gallery')
            ->with('galleries', $galleries);
    }

    public function SaveGallery(Request $request)
    {
        $gallery = new Gallery();

        //save a new Gallery
        $gallery->name = $request->input('gallery_name');
        $gallery->created_by = Auth::user()->id;
        $gallery->published =1;
        $gallery->save();

        return redirect()->back();
    }

    public function viewGalleryPics($id)
    {
        $gallery = Gallery::findorFail($id);

        return view('gallery-view')
            ->with('gallery',$gallery);
    }

    public function doImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        //move the file to correct location
        $file->move('img', $filename);

        $thumb = Image::make(public_path('img/' . $filename))->resize(480, 320);
        $thumb->save('img/' . $filename, 60);
        //save the image details into the database
        $gallery = Gallery::find($request->input('gallery_id'));
        $image = $gallery->images()->create([
            'gallery_id' => $request->input('gallery_id'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/' . $filename,
            'created_by' => Auth::User()->id,
        ]);
        return $image;
    }

    public function deleteGallery($id){
        //load the gallery
        $currentGallery = Gallery::findorFail($id);

        //check ownership
        if($currentGallery->created_by != Auth::user()->id){
            abort('403', 'you are not allow to delete this gallery');
        }
        //get the images
        $images = $currentGallery->images();

        //delete the images
        foreach ($currentGallery->images as $image){
            unlink(public_path($image->file_path));
        }

        //delete the DB records
        $currentGallery->images()->delete();

        $currentGallery->delete();

        return redirect()->back();
    }
}
