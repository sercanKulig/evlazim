<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('gallery/list', 'GalleryController@viewGalleryList');
Route::post('gallery/save', 'GalleryController@SaveGallery');
Route::get('gallery/view/{id}', 'GalleryController@viewGalleryPics');
Route::post('image/do-upload', 'GalleryController@doImageUpload');
Route::get('gallery/delete/{id}', 'GalleryController@deleteGallery');




Route::post('image/friendMain-do-uploads', 'userPageController@doFriendMainImageUpload');
Route::post('image/homeMain-do-uploads', 'userPageController@doHomeMainImageUpload');
Route::post('image/rentMain-do-uploads', 'userPageController@doRentMainImageUpload');


Route::post('image/friend-do-uploads', 'userPageController@doFriendImageUpload');
Route::post('image/home-do-uploads', 'userPageController@doHomeImageUpload');
Route::post('image/rent-do-uploads', 'userPageController@doRentImageUpload');


Route::get('/', 'pageController@home');
Route::get('friendDetail{slug}','pageController@friendDetail');
Route::get('homeDetail{slug}','pageController@homeDetail');
Route::get('rentDetail{slug}','pageController@rentDetail');

Route::post('editRentRun/{slug}', 'userPageController@editRentRun');
Route::post('editFriendRun/{slug}', 'userPageController@editFriendRun');
Route::post('editHomeRun/{slug}', 'userPageController@editHomeRun');

Route::post('newRent','userPageController@newRentRun');
Route::post('newHome','userPageController@newHomeRun');
Route::post('userFriend', 'userPageController@newFriendRun');

Route::post('login', 'userController@loginRun');
Route::post('register', 'userController@registerRun');
Route::post('editUserInfo','userPageController@editUserInfoRun');
Route::post('editUserPass','userPageController@editUserPassRun');

Route::group(['middleware' => ['web']], function(){

	Route::get('register', 'userController@register');
	Route::get('login', 'userController@login')->name('loggin');
	Route::get('logout', 'userController@logout');
	Route::get('contentSelect',[
		'uses' => 'userPageController@contentSelect',
		'as' => 'contentSelect',
		'middleware' => 'auth',
	]);

	Route::get('newFriendPics/{slug}',[
		'uses' => 'userPageController@newFriendPics',
		'as' => 'newFriendPics',
		'middleware' => 'auth',
	]);

	Route::get('newHomePics/{slug}',[
			'uses' => 'userPageController@newHomePics',
			'as' => 'newHomePics',
			'middleware' => 'auth',
	]);

	Route::get('newRentPics/{slug}',[
			'uses' => 'userPageController@newRentPics',
			'as' => 'newRentPics',
			'middleware' => 'auth',
	]);

	Route::get('house',[
		'uses' => 'pageController@house',
		'as' => 'house',
		'middleware' => 'auth',
	]);

	Route::get('/home', [
		'uses' => 'userController@home',
		'as' => 'home',
		'middleware' => 'auth',	
	]);

	Route::get('houseList', [
		'uses' => 'pageController@index',
		'as' => 'houseList',
		'middleware' => 'auth',	
	]);

	Route::get('profil',[
		'uses' => 'userPageController@userHome',
		'as' => 'userHome',
		'middleware' => 'auth',
	]);


	Route::get('/delete-friend/{post_id}',[
		'uses' => 'userPageController@deleteFriend',
		'as' => 'post.friend',
		'middleware' => 'auth',
	]);

	Route::get('/delete-rent/{post_id}',[
			'uses' => 'userPageController@deleteRent',
			'as' => 'post.rent',
			'middleware' => 'auth',
	]);

	Route::get('/delete-home/{post_id}',[
			'uses' => 'userPageController@deleteHome',
			'as' => 'post.home',
			'middleware' => 'auth',
	]);


	Route::get('/editFriend/{slug}',[
			'uses' => 'userPageController@editFriend',
			'as' => 'editFriend',
			'middleware' => 'auth',
	]);

	Route::get('/editRent/{slug}',[
			'uses' => 'userPageController@editRent',
			'as' => 'editRent',
			'middleware' => 'auth',
	]);

	Route::get('/editHome/{slug}',[
			'uses' => 'userPageController@editHome',
			'as' => 'editHome',
			'middleware' => 'auth',
	]);


	Route::get('/editUser',[
			'uses' => 'userPageController@editUser',
			'as' => 'editUser',
			'middleware' => 'auth',
	]);

	Route::get('/editUserInfo',[
			'uses' => 'userPageController@editUserInfo',
			'as' => 'editUserInfo',
			'middleware' => 'auth',
	]);

	Route::get('/editUserPass',[
			'uses' => 'userPageController@editUserPass',
			'as' => 'editUserPass',
			'middleware' => 'auth',
	]);


	Route::get('/newFriend',[
		'uses' => 'userPageController@newFriend',
		'as' => 'newFriend',
		'middleware' => 'auth',
	]);

	Route::get('/newRent',[
			'uses' => 'userPageController@newRent',
			'as' => 'newRent',
			'middleware' => 'auth',
	]);

	Route::get('/newHome',[
			'uses' => 'userPageController@newHome',
			'as' => 'newHome',
			'middleware' => 'auth',
	]);


	Route::post('newFriendCommentRun/{post_id}','userPageController@newFriendCommentRun');
	Route::post('newRentCommentRun/{post_id}','userPageController@newRentCommentRun');
	Route::post('newHomeCommentRun/{post_id}','userPageController@newHomeCommentRun');
});
