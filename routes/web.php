<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Billable;
use Illuminate\Http\Request;


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

//Stripe routes
Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/billing-portal', [StripeController::class, 'billingPortal'])->name('billing-portal');
Route::get('/free-trial-end', [StripeController::class, 'freeTrialEnd'])->name('free-trial-end');


//Routes covers by middleware
Route::middleware(['auth', 'subscription'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('contacts', ContactController::class);
});
