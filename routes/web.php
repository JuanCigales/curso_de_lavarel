<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

//Ruta de welcome
Route::get('/', fn () => auth()->check() ? redirect('/home') : view('welcome'));


//Ruta de log in y registro
Auth::routes();

//Ruta de home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('contacts', ContactController::class);