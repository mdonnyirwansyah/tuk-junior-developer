<?php

use App\Http\Controllers\PesananController;
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

Route::prefix('pesanan')->name('pesanan.')->group(function () {
    Route::get('create', [PesananController::class, 'create'])->name('create');
    Route::post('', [PesananController::class, 'store'])->name('store');
});
