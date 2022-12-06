<?php

use App\Http\Controllers\IndexController;
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

Route::middleware('auth:sanctom')->group(function() {
    Route::prefix('annonce')->group(function() {
        Route::get('/{id?}', [IndexController::class, 'annonce'])->name('annonce.index');
        Route::get('/create', [IndexController::class, 'createAnnonce'])->name('annonce.create');
        Route::post('/', [IndexController::class, 'save'])->name('annonce.save');
        Route::put('/{id}', [IndexController::class, 'edit'])->name('annonce.edit');
    });
    Route::get('/user', [IndexController::class, 'user']);
});

