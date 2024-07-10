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
Route::get('/', function () {
    return view('welcome');
});

//Ruta de log in y registro
Auth::routes();

//Ruta de home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Ruta de controller
Route::get('/contacts/create', [ContactController::class, 'create'])->name("contacts.create");
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name("contacts.edit");
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name("contacts.update");
Route::post('/contacts', [ContactController::class, 'store'])->name("contacts.store");
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name("contacts.destroy");
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name("contacts.show");
