<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Rutas de new contact
Route::get('/contact', function () {
    return Response::view('contact');
});

Route::post('/contact', function (Request $request) {
    dd($request);
});


//Rutas de change password
Route::get('/change-password', fn () => Response::view('change-password'));

Route::post('/change-password', function (Request $request){
    if(auth()->check()){
        //Cambiamos la contraseña
        return response("Password changed to {$request->get('password')}");
    }
    else{
        return response("Not Authenticated", 401);
    }
});