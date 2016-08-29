<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\User;

class userController extends Controller
{
	
	public function home(){
    	return view("/pages.home");
    }

    public function registerRun(Request $request){

    	$validator = Validator::make($request->all(), [
            'adSoyad' => 'required|max:120',
            'dogumTarihi' => 'date_format: Y',
            'cinsiyet' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed', 
            'password_confirmation' => 'min:6|same:password'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else
        {
            
            $newUser = new User();

            $newUser->adSoyad = $request->adSoyad;
            $newUser->dogumTarihi = $request->dogumTarihi;
            $newUser->cinsiyet = $request->cinsiyet;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);

            $newUser->save();
            
        }

        Auth::login($newUser);
        return redirect()->route('houseList');
    }

    public function register(){
     	return view("moderet.register");
    }

    public function login(){
		return view("moderet.login");
    }

    public function loginRun(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){    	
    		return redirect()->route('houseList');
    	}   
    	return redirect()->back();
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('houseList');
    }

}
