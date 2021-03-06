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

use App\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function (){

    Route::resource('/posts','PostsController');
Route::post('search',['uses'=>'PostsController@search','as'=>'posts.search']);
    Route::post('follow',['uses'=>'PostsController@follow','as'=>'posts.follow']);

});
