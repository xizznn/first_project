<?php

use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnArgument;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/my_page', 'MyPlaceController@index');

Route::get('/hello', function () {
    return 'hello';
});

Route::get('/my_super_new_controller', 'MySuperNewController@index');

Route::group(['namespace' => 'Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
});

Route::get('posts/update', 'PostController@update');
Route::get('posts/delete', 'PostController@delete');
Route::get('posts/first_or_create', 'PostController@firstOrCreate');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});

Route::get('posts/update_or_create', 'PostController@updateOrCreate');

Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/contacts', 'ContactsController@index')->name('contact.index');
Route::get('/about', 'AboutController@index')->name('about.index');
