<?php

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

Auth::routes([
    'verify' => true,
    'reset' => true,
]);

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Web', 'middleware' => 'auth'], function() {
    Route::resource('book', 'BookController')->except(['show','destroy']);
    Route::get('del-many', 'BookController@deleteMany')->name('del-many');
    Route::get('borrow', 'BorrowController@index')->name('borrow.index');
    Route::get('borrow/form_to_day', 'BorrowController@fromDayToDay')->name('borrow.from_to_day');
    Route::post('borrow/get_day', 'BorrowController@getDay')->name('borrow.get_day');
    Route::get('borrower', 'BorrowerController@index')->name('borrower.index');
});