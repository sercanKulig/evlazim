<?php

namespace App\Http\Controllers;

use App\newFriendComment;
use App\newHomeComment;
use App\newRentComment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;


use App\User;
use App\NewFriend;
use App\NewHome;
use App\NewRent;

class pageController extends Controller
{
    public function home(){
        $newfriends = NewFriend::orderBy('id', 'DESC')->get();
        $newhouses = NewHome::orderBy('id', 'DESC')->get();
        $newrents = NewRent::orderBy('id', 'DESC')->get();
        return view('pages.houseList', compact('newfriends','newhouses','newrents'));
    }

	public function deneme(){
    	return view("deneme");
    }

    public function user(){

    	$kullanicilar = User::all();

    	return $kullanicilar;
    }

    public function house(){
        return view("user.profil");
    }

    public function index(){
        $newfriends = NewFriend::orderBy('id', 'DESC')->get();
        $newhouses = NewHome::orderBy('id', 'DESC')->get();
        $newrents = NewRent::orderBy('id', 'DESC')->get();

        return view('pages.houseList', compact('newfriends','newhouses','newrents'));
    }

    public function friendDetail($slug){
        $newfriends = NewFriend::where('slug', $slug)->first();
        $friendcomment = NewFriendComment::orderBy('id', 'DESC')->get();
        return view('pages.friendDetail', compact('newfriends','friendcomment'));
    }

    public function homeDetail($slug){
        $newhouses = NewHome::where('slug', $slug)->first();
        $homecomment = NewHomeComment::orderBy('id', 'DESC')->get();
        return view('pages.houseDetail', compact('newhouses','homecomment'));
    }

    public function rentDetail($slug){
        $newrents = NewRent::where('slug', $slug)->first();
        $rentcomment = NewRentComment::orderBy('id', 'DESC')->get();
        return view('pages.rentDetail', compact('newrents','rentcomment'));
    }
}
