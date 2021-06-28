<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanoController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\YapilacakController;

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


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/panolar', PanoController::class);
    Route::resource('/listeler', ListeController::class);
    Route::get('/yapilacaklar/ekle/{listeid}', YapilacakController::class)->name('yapilacaklar');
    Route::get('/yapilacaklar/durum/{yapilacakid}/{durum}', [YapilacakController::class, 'durumguncelle'])->name('yapilacaklar.durum');
    Route::get('/yapilacaklar/sil/{yapilacakid}/', [YapilacakController::class, 'sil'])->name('yapilacaklar.sil');
    Route::get('/yapilacaklar/tasi/{yapilacakid}', [YapilacakController::class, 'tasi'])->name('yapilacaklar.tasi');
});
