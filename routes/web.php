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
    /* book */
    Route::resource('book', 'BookController')->except(['show','destroy']);
    Route::get('del-many', 'BookController@deleteMany')->name('del-many');
    /* borrow */
    Route::get('borrow', 'BorrowController@index')->name('borrow.index');
    Route::get('borrow/form_to_day', 'BorrowController@fromDayToDay')->name('borrow.from_to_day');
    Route::post('borrow/get_day', 'BorrowController@getDay')->name('borrow.get_day');
    /* borrower */
    Route::resource('borrower', 'BorrowerController')->only(['index','create','store']);
    Route::get('borrower/today', 'BorrowerController@getToDay')->name('borrower.today');
    Route::get('borrower/not_refunded', 'BorrowerController@getNotRefunded')->name('borrower.not_refunded');
    /* borrower ORM*/
    Route::resource('borrower-orm', 'BorrowerORMController')->only(['index']);
    Route::get('borrower-orm/today', 'BorrowerORMController@getToDay')->name('borrower-orm.today');
    Route::get('borrower-orm/not_refunded', 'BorrowerORMController@getNotRefunded')->name('borrower-orm.not_refunded');
    /* author */
    Route::resource('author', 'AuthorController')->except(['show','destroy','edit']);
    Route::get('delete-author', 'AuthorController@deleteAuthor')->name('author.delete');
});