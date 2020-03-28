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

    // Auth::routes(['verify' => 'true']);
    
    // Email Verification Routes 
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('verification.verify');
   
    // Authentication Routes 
    Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('auth/login', 'Auth\LoginController@login')->name('login.post');
    Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');
    
    // Registration routes
    Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('auth/register', 'Auth\RegisterController@register')->name('register.post');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


    // Categories
    Route::resource('categories', 'CategoryController')->except('create');

    // Tags
    Route::resource('tags', 'TagController')->except('create');

    // Using slug
    Route::get('/blog/{slug}', 'BlogController@single')->name('blog.single')->where('slug', '[\w\d\-\_]+');
    Route::get('blog', 'BlogController@index')->name('blog.index');

    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::resource('posts', 'PostController');
});