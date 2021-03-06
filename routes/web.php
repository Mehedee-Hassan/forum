<?php

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


Route::get('/', function () {

    $threads = \App\Thread::paginate(3);

    return view('welcome',compact('threads'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('thread','ThreadController');

Route::resource('comment','CommentController',['only'=>['update','destroy']]);


Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');
Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');


Route::post('markAsSolution','ThreadController@markAsSolution')->name('markAsSolution');

Route::post('likeIt','LikeController@toggleLike')->name('likeIt');



Route::get('/user/profile/{user}','UserProfileController@index')->name('user_profile');



Route::get('/markAsRead',function(){

	auth()->user()->unreadNotifications->markAsRead();
});