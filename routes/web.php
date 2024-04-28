<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PrevController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\MatrixController;
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
    return view('user');
});
Route::get('/', [LoginController::class, 'user'])->name('user');

Route::get('welcome', function () {
    return view('welcome');
})->name('login.index');

Route::post('welcome', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('beranda', [BerandaController::class, 'index'])->name('beranda');
Route::post('beranda', [BerandaController::class, 'upload'])->name('up.dataset');
Route::get('sampel1', [BerandaController::class, 'getsampel1'])->name('getsampel1');

Route::get('preview',[PrevController::class,'index'])->name('priview');
Route::get('/hapus-dataset', [PrevController::class, 'hapus'])->name('hapus.dataset');
Route::get('perhitungan',[PerhitunganController::class,'index'])->name('perhitungan');

Route::get('node1_1',[PerhitunganController::class,'nodes1_1'])->name('node1_1');
Route::get('perhitungan2', [PerhitunganController::class, 'index2'])->name('perhitungan2');
Route::get('hasil', [PrevController::class, 'hasil'])->name('hasil');

Route::get('matrix', [MatrixController::class, 'index'])->name('matrix');
Route::post('matrix/{id}', [MatrixController::class, 'up'])->name('matrix.up');