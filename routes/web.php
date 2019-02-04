<?php
// use Illuminate\View\View;
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

Route::get('/1', function () {
    return View::make('1');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/6/2', function () {
    return View::make('6.2');
});

Route::get('/7/1', function () {
    return View::make('7.1');
});

Route::get('/7/2', function () {
    return View::make('7.2');
});

Route::get('/7/3', function () {
    return View::make('7.3');
});

Route::get('/8/1', function () {
    return View::make('8.1');
});
