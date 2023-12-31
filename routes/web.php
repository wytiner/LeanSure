<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('claims', ClaimController::class);

    Route::prefix('claims')->name('claims.')->group(function () {
        Route::post('{claim}/updateStatus', [ClaimController::class, 'updateStatus'])->name('updateStatus');
        Route::post('{claim}/updateInvoiceStatus', [ClaimController::class, 'updateInvoiceStatus'])->name('updateInvoiceStatus');
        Route::post('/filter', [ClaimController::class, 'filter'])->name('filter');
    });
    Route::get('/claims-chart-data', [ClaimController::class, 'showChart'])->name('getChartData');
});
