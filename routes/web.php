<?php

use App\Http\Controllers\CommentsController;
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



Auth::routes();
Route::get('logout', 'Auth\loginController@logout')->name('logout');
//blog
Route::get('/blog/{slug}', ['as'=>'blog.single', 'uses'=>'BlogController@getsingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog', ['uses'=>'BlogController@index', 'as'=>'blog.index']);
//home
Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@postcontact');
Route::get('/about', 'PagesController@about');
//posts
Route::resource('posts', 'PostsController');
//categories
Route::resource('categories', 'CategoriesController')->except('create');
//comments
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
Route::delete('comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');
