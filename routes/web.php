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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('login');

Route::middleware(['auth'])->group(function(){

    //ログイン中からログアウト
Route::get('/logout', 'Auth\LoginController@logout');

//ログイン中のページ
Route::get('/top','PostsController@index');
Route::post('/top','PostsController@create');
Route::post('/post/update','PostsController@postUpdate');

Route::post('/post/delete','PostsController@delete');

Route::get('/users.profile','UsersController@profile');

Route::get('/search', 'UsersController@search')->name('users.search');
Route::post('/search','UsersController@search');
Route::get('/users.search', 'UsersController@create' );
Route::post('/users.search','UsersController@create');

Route::post('/users.','UsersController@create');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

// プロフィールを更新させる
Route::post('/users.profile','UsersController@updateProfile');

//検索フォーム用
Route::get('/username','UsersController@username');
Route::post('/username','UsersController@username');

Route::post('/users/{id}/follow', 'FollowsController@follow')->name('follow');
Route::delete('/users/{id}/unfollow', 'FollowsController@unfollow')->name('unfollow');
});

//ログアウト中のページ
//Route::get('/login', 'Auth\LoginController@login');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');



//新規登録
 //Route::get('/top','UsersController@users');

 //Route::get('/login','Auth\loginController@login')-> name('login');
