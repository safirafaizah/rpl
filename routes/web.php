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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes([
    'register' => false, // Registration Routes...
  ]);

Route::get('/login/sso_klas2/', [App\Http\Controllers\HomeController::class, 'sso_klas2'])->name('sso_klas2');
Route::get('/login/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [App\Http\Controllers\GoogleController::class, 'handleCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

//MAIN
Route::group(['prefix' => 'rekognisi','middleware' => ['auth']], function () {
  Route::any('/', [App\Http\Controllers\RekognisiController::class, 'index'])->name('rekognisi.index');
  Route::get('/data', [App\Http\Controllers\RekognisiController::class, 'data'])->name('rekognisi.data');
  Route::any('/ubah/{id}', [App\Http\Controllers\RekognisiController::class, 'ubah'])->name('rekognisi.ubah');
  Route::delete('/hapus', [App\Http\Controllers\RekognisiController::class, 'hapus'])->name('rekognisi.hapus');
  
});
