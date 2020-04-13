<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//first profile saver

Route::post('/firstprofilesaver', 'ProfileController@store')->middleware('auth')->name('store');


//saving the users profile image

Route::post('/saveprofileImage', 'ProfileController@storeProfileImage')->middleware('auth')->name('store');

//after user has completed their profile after login

Route::get('/dashboard', 'HomeController@dashoard')->middleware('auth')->name('store');

//select user profile image
Route::get('/selectuserdata/{id}', 'ProfileController@profileImage')->middleware('auth')->name('store');


//select user other files
Route::get('/selectotheruserdata/{id}', 'ProfileController@selectotheruserdata')->middleware('auth')->name('store');

//get user posts


Route::get('/userposts/{id}', 'PostController@selectuserposts')->middleware('auth')->name('store');


//add new post view

Route::get('/addnewpost', 'PostController@index')->middleware('auth')->name('store');

//add new post submit


Route::post('/addnewpost', 'PostController@create')->middleware('auth')->name('addnewpost');


//edit profile

Route::get('/editprofile', 'ProfileController@edit')->middleware('auth')->name('edit');

//editprofile submit

Route::post('/editprofilesubmit', 'ProfileController@update')->middleware('auth')->name('editprofile');

//this is a temporary rout


Route::get('/allposts', 'PostController@all')->middleware('auth')->name('all');

//follow

Route::post('/follow/{id}', 'FollowController@toggle')->middleware('auth')->name('all');

//select users followings


Route::post('/selectusersfollowings/{id}', 'FollowController@followings')->middleware('auth')->name('all');


Route::get('/email',function(){
    return view('emailing');
});



Route::post('/email',function(Request $request){
    $data=$request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'message'=>'required'
    ]);



    Mail::to('morganhezekiah1@gmail.com')->send(new ContactMail($data));
    return redirect('/');
})->name('storeemail');


Route::get('/testform',function(){
    return view("sampleform");
});

Route::post('/testformsubmit','TestController@store');
