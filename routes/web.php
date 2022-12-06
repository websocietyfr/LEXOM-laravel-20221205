<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PaymentController;
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
});

Route::get('/accueil', [IndexController::class, 'index']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/cgv', [IndexController::class, 'cgv']);

// Route::get('/annonce/{id?}', [IndexController::class, 'annonce'])->name('annonce.index');
// Route::get('/annonce/create', [IndexController::class, 'createAnnonce'])->name('annonce.create');
// Route::post('/annonce', [IndexController::class, 'save']);
// Route::put('/annonce/{id}', [IndexController::class, 'edit']);

// routes de paiements
Route::prefix('payment')->group(function() {
    Route::get('/', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/{id}', [PaymentController::class, 'show'])->name('payment.show');
    Route::get('/{id}/edit', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::put('/{id}', [PaymentController::class, 'update'])->name('payment.update');
    Route::delete('/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
});

// Route::resource('annonce', AnnonceController::class);
Route::resource('annonce', AnnonceController::class)->middleware('postman');
