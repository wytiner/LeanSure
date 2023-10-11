<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/claims/create', [ClaimController::class, 'create'])->name('claims.create');
Route::post('/claims', [ClaimController::class, 'store'])->name('claims.store');
Route::get('/claims/{claim}', [ClaimController::class, 'show'])->name('claims.show');
Route::get('/claims/{claim}/edit', [ClaimController::class, 'edit'])->name('claims.edit');
Route::put('/claims/{claim}', [ClaimController::class, 'update'])->name('claims.update');
Route::delete('/claims/{claim}', [ClaimController::class, 'destroy'])->name('claims.destroy');
Route::get('/claims', [ClaimController::class, 'index'])->name('claims.index');
Route::post('/claims/filter', [ClaimController::class, 'filter'])->name('claims.filter');

