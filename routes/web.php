<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
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
})->name('welcome');

// Socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware(['auth'])->group(function () {
    // Checkout route
    route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    route::get('checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');

    // User dashboard
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
