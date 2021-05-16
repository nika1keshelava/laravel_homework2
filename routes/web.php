<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*erti saatia vcdilob gavarkvio tu ratom ar xsnis /posts-s  :((  */
Route::get('/posts', 'PostsController@allPosts');

Route::post('/add-posts', 'PostsController@savePost');
Route::get('/delete-post/{id}', 'PostsController@deletePost');
Route::get('/edit-post/{id}', 'PostsController@editPost');
Route::post('/update-posts', 'PostsController@updatePosts');
