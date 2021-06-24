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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum','verified'])->resource('/panolar',PanoController::class);
Route::middleware(['auth:sanctum','verified'])->resource('/listeler', ListeController::class);
Route::middleware(['auth:sanctum','verified'])->get('/yapilacaklar/ekle/{listeid}',YapilacakController::class)->name('yapilacaklar');
Route::middleware(['auth:sanctum','verified'])->get('/yapilacaklar/durum/{yapilacakid}/{durum}',[YapilacakController::class,'durumguncelle'])->name('yapilacaklar.durum');
Route::middleware(['auth:sanctum','verified'])->get('/yapilacaklar/sil/{yapilacakid}/',[YapilacakController::class,'sil'])->name('yapilacaklar.sil');

