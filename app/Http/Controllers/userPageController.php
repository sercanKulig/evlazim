<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Http\Requests;
use Validator;
use Auth;
use Hash;
use File;


use App\User;
use App\NewFriend;
use App\NewHome;
use App\NewRent;
use App\NewFriendComment;

class userPageController extends Controller
{
    public function userHome(){
        $newfriends = NewFriend::where('user_id','=', Auth::id())->get();
        $newhouses = NewHome::where('user_id','=', Auth::id())->get();
        $newrents = NewRent::where('user_id','=', Auth::id())->get();
        return view("/user.profil", compact('newfriends','newhouses', 'newrents'));;
    }

    public function contentSelect(){
        return view('user.contentSelect');
    }


    public function deleteFriend($post_id){
        $post = NewFriend::where('id', $post_id)->first();
        //$post = Post::find($post_id)->first();  aynı şey
        $post->delete();
        return redirect()->route('userHome')->with(['message' => 'Başarıyla silindi!' ]);
    }

    public function deleteRent($post_id){
        $post = NewRent::where('id', $post_id)->first();
        //$post = Post::find($post_id)->first();  aynı şey
        $post->delete();
        return redirect()->route('userHome')->with(['message' => 'Başarıyla silindi!' ]);
    }

    public function deleteHome($post_id){
        $post = NewHome::where('id', $post_id)->first();
        //$post = Post::find($post_id)->first();  aynı şey
        $post->delete();
        return redirect()->route('userHome')->with(['message' => 'Başarıyla silindi!' ]);
    }



    public function editFriend($slug){
        $newfriends = NewFriend::where('slug', $slug)->first();

        return view('user.editFriend')
            ->with('newfriends',$newfriends);
    }

    public function editRent($slug){
        $newrents = NewRent::where('slug', $slug)->first();

        return view('user.editRent')
            ->with('newrents',$newrents);;
    }

    public function editHome($slug){

        $newhouses = NewHome::where('slug', $slug)->first();

        return view('user.editHome')
            ->with('newhouses',$newhouses);
    }



    public function editFriendRun(Request $request,$slug){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'sehir' => 'required',
            'ilce' => 'required',
            'cinsiyet' => 'required',
            'acik_adres' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $request->merge([
                'slug' => str_slug($request->baslik)
            ]);

            NewFriend::find($request->id)->update($request->all());
        }
        session()->flash('success', 'Güncelleme yapıldı.');
        return redirect()->route('userHome');
    }

    public function editRentRun(Request $request,$slug){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'fiyat' => 'required',
            'ayrinti' => 'required',
            'sehir' => 'required',
            'ilce' => 'required',
            'acik_adres' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $request->merge([
                'slug' => str_slug($request->baslik)
            ]);

            NewRent::find($request->id)->update($request->all());
        }
        session()->flash('success', 'Güncelleme yapıldı.');
        return redirect()->route('userHome');
    }

    public function editHomeRun(Request $request,$slug){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'fiyat' => 'required',
            'sehir' => 'required',
            'ilce' => 'required',
            'semt' => 'required',
            'kiralar_misin' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            $request->merge([
                'slug' => str_slug($request->baslik)
            ]);

            NewHome::find($request->id)->update($request->all());
        }
        session()->flash('success', 'Güncelleme yapıldı.');
        return redirect()->route('userHome');
    }


    public function editUser(){
        return view("user.editUser");
    }

    public function editUserInfo(){
        return view("user.editUserInfo");
    }

    public function editUserPass(){
        return view("user.editUserPass");
    }

    public function editUserInfoRun(Request $request){
        $userId = Auth::id();
        $validator = Validator::make($request->all(), [
            'adSoyad' => 'required|max:120',
            'dogumTarihi' => 'date_format: Y',
            'cinsiyet' => 'required',
            'email' => 'required|email',
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else{
            User::find($userId)->update($request->all());
        }
        return redirect()->route('userHome');
    }

    public function editUserPassRun(Request $request){
        $user = Auth::user();

        $validation = Validator::make($request->all(), [
            'password' => 'hash:' . $user->password,
            'new_password' => 'required|different:password|confirmed'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->back()
            ->with('success-message', 'Your new password is now set!');
    }


    public function newFriend(){
        return view('user.newFriend');
    }

    public function newHome(){
        return view('user.newHome');
    }

    public function newRent(){
        return view('user.newRent');
    }


    public function newRentRun(Request $request){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'fiyat' => 'required',
            'kiralar_misin' => 'required',
            'sehir' => 'required',
            'ilce' => 'required',
            'acik_adres' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $post = new NewRent();

            $post->baslik = $request->baslik;
            $post->cesit = $request->cesit;
            $post->fiyat = $request->fiyat;
            $post->ayrinti = $request->ayrinti;
            $post->kiralar_misin = $request->kiralar_misin;
            $post->sehir = $request->sehir;
            $post->ilce = $request->ilce;
            $post->acik_adres = $request->acik_adres;
            $post->ev = $request->ev;
            $post->esyali = $request->esyali;
            $post->kullanım_durumu = $request->kullanım_durumu;
            $post->oda_sayisi = $request->oda_sayisi;
            $post->kat = $request->kat;
            $post->yas = $request->yas;
            $post->isitma = $request->isitma;
            $post->cephe = $request->cephe;
            $post->universite = $request->universite;
            $post->sehir_merkezi = $request->sehir_merkezi;
            $post->market = $request->market;
            $post->saglik_ocagi = $request->saglik_ocagi;
            $post->eczane = $request->eczane;
            $post->eglence = $request->eglence;
            $post->pazar = $request->pazar;
            $post->cami = $request->cami;
            $post->spor_salonu = $request->spor_salonu;
            $post->park= $request->park;
            $post->anayol = $request->anayol;
            $post->cadde = $request->cadde;
            $post->otobüs = $request->otobüs;
            $post->dolmuş = $request->dolmuş;
            $post->metro = $request->metro;
            $post->tren = $request->tren;
            $post->metrobüs = $request->metrobüs;
            $post->iskele = $request->iskele;
            $post->minibüs = $request->minibüs;
            $post->teleferik = $request->teleferik;
            $post->slug = str_slug($request->baslik);

            $request->user()->newrent()->save($post);
        }
        return redirect()->route('newRentPics',['slug' => str_slug($request->baslik)]);
    }

    public function newHomeRun(Request $request){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'fiyat' => 'required',
            'sehir' => 'required',
            'ilce' => 'required',
            'semt' => 'required',
            'kiralar_misin' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $post = new NewHome();

            $post->baslik = $request->baslik;
            $post->cesit = $request->cesit;
            $post->fiyat = $request->fiyat;
            $post->ayrinti = $request->ayrinti;
            $post->kiralar_misin = $request->kiralar_misin;
            $post->sehir = $request->sehir;
            $post->ilce = $request->ilce;
            $post->semt = $request->semt;
            $post->aciklama = $request->aciklama;
            $post->ev = $request->ev;
            $post->esyali = $request->esyali;
            $post->kullanım_durumu = $request->kullanım_durumu;
            $post->oda_sayisi = $request->oda_sayisi;
            $post->kat = $request->kat;
            $post->yas = $request->yas;
            $post->isitma = $request->isitma;
            $post->cephe = $request->cephe;
            $post->universite = $request->universite;
            $post->sehir_merkezi = $request->sehir_merkezi;
            $post->market = $request->market;
            $post->saglik_ocagi = $request->saglik_ocagi;
            $post->eczane = $request->eczane;
            $post->eglence = $request->eglence;
            $post->pazar = $request->pazar;
            $post->cami = $request->cami;
            $post->spor_salonu = $request->spor_salonu;
            $post->park= $request->park;
            $post->anayol = $request->anayol;
            $post->cadde = $request->cadde;
            $post->otobüs = $request->otobüs;
            $post->dolmuş = $request->dolmuş;
            $post->metro = $request->metro;
            $post->tren = $request->tren;
            $post->metrobüs = $request->metrobüs;
            $post->iskele = $request->iskele;
            $post->minibüs = $request->minibüs;
            $post->teleferik = $request->teleferik;
            $post->slug = str_slug($request->baslik);


            $request->user()->newhome()->save($post);
        }
        return redirect()->route('newHomePics',['slug' => str_slug($request->baslik)]);
    }

    public function newFriendRun(Request $request){
    $validator = Validator::make($request->all(), [
        'baslik' => 'required',
        'sehir' => 'required',
        'ilce' => 'required',
        'cinsiyet' => 'required',
        'acik_adres' => 'required',
    ]);

    if($validator->fails()) {
        return redirect()->back()->withInput()->withErrors($validator);
    }else{
        $post = new NewFriend();

        $post->cesit = $request->cesit;
        $post->baslik = $request->baslik;
        $post->fiyat = $request->fiyat;
        $post->cinsiyet = $request->cinsiyet;
        $post->neden = $request->neden;
        $post->elektrik = $request->elektrik;
        $post->su = $request->su;
        $post->dogalgaz = $request->dogalgaz;
        $post->internet = $request->internet;
        $post->ayrinti = $request->ayrinti;
        $post->sehir = $request->sehir;
        $post->ilce = $request->ilce;
        $post->acik_adres = $request->acik_adres;
        $post->yatak = $request->yatak;
        $post->gardorap = $request->gardorap;
        $post->komidin = $request->komidin;
        $post->hali = $request->hali;
        $post->perde = $request->perde;
        $post->calisma_masasi = $request->calisma_masasi;
        $post->sandalye = $request->sandalye;
        $post->lamba = $request->lamba;
        $post->kitaplik = $request->kitaplik;
        $post->ekstra_isitici = $request->ekstra_isitici;
        $post->ekstra_sogutucu = $request->ekstra_sogutucu;
        $post->evde_kalan = $request->evde_kalan;
        $post->oda_sayisi = $request->oda_sayisi;
        $post->isinma_cesidi = $request->isinma_cesidi;
        $post->oturma_odasi = $request->oturma_odasi;
        $post->beyaz_esya = $request->beyaz_esya;
        $post->mutfak_esya= $request->mutfak_esya;
        $post->televizyon = $request->televizyon;
        $post->tuvalet = $request->tuvalet;
        $post->bina_yasi = $request->bina_yasi;
        $post->evin_kati = $request->evin_kati;
        $post->ev = $request->ev;
        $post->cephe = $request->cephe;
        $post->hayvan = $request->hayvan;
        $post->sigara = $request->sigara;
        $post->alkol = $request->alkol;
        $post->kalabalik = $request->kalabalik;
        $post->site = $request->site;
        $post->gorevli = $request->gorevli;
        $post->guvenlik = $request->guvenlik;
        $post->otopark = $request->otopark;
        $post->asansor = $request->asansor;
        $post->slug = str_slug($request->baslik);


        $request->user()->newfriend()->save($post);
    }
    return redirect()->route('newFriendPics',['slug' => str_slug($request->baslik)]);
}


    public function newRentPics($slug){

        $newrents = NewRent::where('slug', $slug)->first();

        return view('user.newRentPics')
            ->with('newrents',$newrents);
    }

    public function newHomePics($slug){

        $newhomes = NewHome::where('slug', $slug)->first();

        return view('user.newHomePics')
            ->with('newhomes',$newhomes);
    }

    public function newFriendPics($slug){

        $newfriends = NewFriend::where('slug', $slug)->first();

        return view('user.newFriendPics')
            ->with('newfriends',$newfriends);
    }


    public function doFriendMainImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        $User_id = NewFriend::find($request->input('user_id'));
        /*
        foreach ($User_id->friend_pics as $image){
            unlink(public_path($image->file_path));
        }
        */
        $User_id->friend_pics()->where('main', 1)->delete();

        //move the file to correct location
        $file->move('img/friendMain', $filename);

        $thumb = Image::make('img/friendMain/' . $filename)->resize(720, 480)->save('img/friendMain/' . $filename, 60);
        //save the image details into the database
        $usermove = NewFriend::find($request->input('user_id'));
        $image = $usermove->friend_pics()->create([
            'user_id' => Auth::user()->id,
            'slug' => $request->input('slug'),
            'main' => $request->input('main'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/friendMain/' . $filename,
        ]);
        return $image;
    }

    public function doHomeMainImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        $User_id = NewHome::find($request->input('user_id'));
        $User_id->home_pics()->where('main', 1)->delete();

        //move the file to correct location
        $file->move('img/homeMain', $filename);

        $thumb = Image::make('img/homeMain/' . $filename)->resize(720, 480)->save('img/homeMain/' . $filename, 60);
        //save the image details into the database
        $usermove = NewHome::find($request->input('user_id'));
        $image = $usermove->home_pics()->create([
            'user_id' => Auth::user()->id,
            'slug' => $request->input('slug'),
            'main' => $request->input('main'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/homeMain/' . $filename,
        ]);
        return $image;
    }

    public function doRentMainImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        $User_id = NewRent::find($request->input('user_id'));
        $User_id->rent_pics()->where('main', 1)->delete();

        //move the file to correct location
        $file->move('img/rentMain', $filename);

        $thumb = Image::make('img/rentMain/' . $filename)->resize(720, 480)->save('img/rentMain/' . $filename, 60);
        //save the image details into the database
        $usermove = NewRent::find($request->input('user_id'));
        $image = $usermove->rent_pics()->create([
            'user_id' => Auth::user()->id,
            'slug' => $request->input('slug'),
            'main' => $request->input('main'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/rentMain/' . $filename,
        ]);
        return $image;
    }


    public function doFriendImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        //move the file to correct location
        $file->move('img/friend', $filename);

        $thumb = Image::make('img/friend/' . $filename)->resize(720, 480)->save('img/friend/' . $filename, 60);
        //save the image details into the database
        $usermove = NewFriend::find($request->input('user_id'));
        $image = $usermove->friend_pics()->create([

            'user_id' => Auth::user()->id,
            'slug' => $request->input('slug'),
            'main' => $request->input('main'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/friend/' . $filename,
        ]);
        return $image;
    }

    public function doHomeImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        //move the file to correct location
        $file->move('img/home', $filename);

        $thumb = Image::make('img/home/' . $filename)->resize(720, 480)->save('img/home/' . $filename, 60);
        //save the image details into the database
        $usermove = NewHome::find($request->input('user_id'));
        $image = $usermove->home_pics()->create([

            'user_id' => Auth::user()->id,
            'slug' => $request->input('slug'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/home/' . $filename,
        ]);
        return $image;
    }

    public function doRentImageUpload(Request $request)
    {
        //get the file from the request
        $file = $request->file('file');

        //set my file name
        $filename= uniqid() . $file->getClientOriginalName();

        //move the file to correct location
        $file->move('img/rent', $filename);

        $thumb = Image::make('img/rent/' . $filename)->resize(720, 480)->save('img/rent/' . $filename, 60);
        //save the image details into the database
        $usermove = NewRent::find($request->input('user_id'));
        $image = $usermove->rent_pics()->create([

            'user_id' => Auth::user()->id,
            'slug' => $request->input('slug'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'img/rent/' . $filename,
        ]);
        return $image;
    }


    public function newFriendCommentRun(Request $request, $post_id){
        $validator=Validator::make($request->all(), [
            'yorum' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{

            $post = NewFriend::find($post_id);
            $image = $post->new_friend_comments()->create([

                'user_id' => Auth::user()->id,
                'user' => Auth::user()->adSoyad,
                'yorum' => $request->input('yorum'),
                'block' => 1,
            ]);
        }
        return redirect()->back();
    }
    public function newRentCommentRun(Request $request, $post_id){
        $validator=Validator::make($request->all(), [
            'yorum' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{

            $post = NewRent::find($post_id);
            $image = $post->new_rent_comments()->create([

                'user_id' => Auth::user()->id,
                'user' => Auth::user()->adSoyad,
                'yorum' => $request->input('yorum'),
                'block' => 1,
            ]);
        }
        return redirect()->back();
    }
    public function newHomeCommentRun(Request $request, $post_id){
        $validator=Validator::make($request->all(), [
            'yorum' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }else{

            $post = NewHome::find($post_id);
            $image = $post->new_home_comments()->create([

                'user_id' => Auth::user()->id,
                'user' => Auth::user()->adSoyad,
                'yorum' => $request->input('yorum'),
                'block' => 1,
            ]);
        }
        return redirect()->back();
    }
    /*
     * Güvenlik
     *         function sanitize($string, $force_lowercase = true, $anal = false)
        {
            $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
                "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                "â€”", "â€“", ",", "<", ".", ">", "/", "?");
            $clean = trim(str_replace($strip, "", strip_tags($string)));
            $clean = preg_replace('/\s+/', "-", $clean);
            $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

            return ($force_lowercase) ?
                (function_exists('mb_strtolower')) ?
                    mb_strtolower($clean, 'UTF-8') :
                    strtolower($clean) :
                $clean;
        }
     *
     *
     *
     * Eğer login değilse yapamaz!!
    if(Auth::user() !=$house->user){
    return redirect()->back();
    }*/

    /*resim dosyası silme
        $User_id = NewFriend::find($request->input('user_id'));
        foreach ($User_id->friend_pics as $image){
            unlink(public_path($image->file_path));
        }
        */
}
