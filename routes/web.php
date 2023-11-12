<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/bookmarks', BookmarkController::class. '@index')->name('bookmarks');
//create a new contacts
Route::get('/bookmarks/create', BookmarkController::class. '@create')->name('bookmarksCreate');
//save a contatc
Route::post('/bookmarks/store', BookmarkController::class. '@store')->name('bookmarksStore');

Route::get('/bookmarks/create', BookmarkController::class. '@create')->name('bookmarksCreate');
//save a contatc
Route::post('/bookmarks/store', BookmarkController::class. '@store')->name('bookmarksStore');

Route::get('/bookmarks/{contact}/edit', BookmarkController::class. '@edit')->name('bookmarksEdit');
// updates a contact
Route::put('/bookmarks/{contact}',  BookmarkController::class. '@update')->name('bookmarksUpdate');
// deletes a contact
Route::delete('/bookmarks/{contact}',  BookmarkController::class. '@delete')->name('bookmarksDelete');