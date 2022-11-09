<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('books', BookController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('peminjams', PeminjamController::class);
});

Route::get('/user', [BookController::class, 'index']);
Route::get('/user', [BookController::class, 'update']);

Route::get('/user', [PeminjamController::class, 'index']);

require __DIR__.'/auth.php';
