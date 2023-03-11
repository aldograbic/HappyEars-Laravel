<?php

use App\Http\Controllers\AudioBookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextBookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login-page');
Route::get('/registration', [RegistrationController::class, 'index'])->name('registration-page');
Route::get('/audio-stories', [AudioBookController::class, 'index'])->name('audiobooks-page');
Route::get('/stories', [TextBookController::class, 'index'])->name('textbooks-page');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile-page');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('registration', [RegistrationController::class, 'registration'])->name('registration');

Route::post('/stories', [TextBookController::class, 'store'])->name('text_books.store');
Route::get('/stories/{story}', [TextBookController::class, 'show'])->name('text_books.show');

Route::post('/audio-stories', [AudioBookController::class, 'store'])->name('audio_books.store');
Route::get('/audio-stories/{story}', [AudioBookController::class, 'show'])->name('audio_books.show');

Route::delete('delete/{id}', [ProfileController::class, 'delete'])->name('delete');