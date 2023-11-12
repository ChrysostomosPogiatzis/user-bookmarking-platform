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
 
 
Route::get('/bookmarks/create', BookmarkController::class. '@create')->name('bookmarksCreate');
 
Route::post('/bookmarks/store', BookmarkController::class. '@store')->name('bookmarksStore');

Route::get('/bookmarks/{bookmark}/edit', BookmarkController::class. '@edit')->name('bookmarksEdit');
 
Route::put('/bookmarks/{bookmark}',  BookmarkController::class. '@update')->name('bookmarksUpdate');
 
Route::get('/bookmarks/{bookmark}/delete',  BookmarkController::class. '@delete')->name('bookmarksDelete');
Route::delete('/bookmarks/{bookmark}',  BookmarkController::class. '@delete_confirmed')->name('bookmarksDelete_confirmed');