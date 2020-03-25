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

Route::group(['middleware' => ['web']], function(){
    
    // Authentication Routes 
    Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('auth/login', 'Auth\LoginController@login')->name('login.post');
    Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');
    // Registration routes
    Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('auth/register', 'Auth\RegisterController@register')->name('register.post');

    // Using slug
    Route::get('/blog/{slug}', 'BlogController@single')->name('blog.single')->where('slug', '[\w\d\-\_]+');
    Route::get('blog', 'BlogController@index')->name('blog.index');

    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::resource('posts', 'PostController');
});