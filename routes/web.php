<?php

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PEMBAYARAN
Route::get('/index', [App\Http\Controllers\PembayaranController::class, 'index'])->name('pembayaran.index');
Route::get('/create', [App\Http\Controllers\PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/store', [App\Http\Controllers\PembayaranController::class, 'store'])->name('pembayaran.store');
Route::delete('/delete', [App\Http\Controllers\PembayaranController::class, 'delete'])->name('pembayaran.delete');

//++
Route::get('/getSiswa/{nisn}', [App\Http\Controllers\PembayaranController::class, 'getSiswa']);
Route::get('/struk/{id_pembayaran}', [App\Http\Controllers\PembayaranController::class, 'struk'])->name('pembayaran.struk');
Route::get('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
Route::get('/histori', [App\Http\Controllers\PembayaranController::class, 'histori'])->name('histori');
Route::get('/cari', [App\Http\Controllers\PembayaranController::class, 'cari'])->name('cari');



//Kelas
Route::get('/kindex', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index');
Route::get('/kcreate', [App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
Route::post('/kstore', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::get('/kedit/{id_kelas}', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
Route::post('/kupdate/{id_kelas}', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kdelete/{id_kelas}', [App\Http\Controllers\KelasController::class, 'destroy'])->name('kelas.delete');

//SPP
Route::get('/sindex', [App\Http\Controllers\SppController::class, 'index'])->name('spp.index');
Route::get('/screate', [App\Http\Controllers\SppController::class, 'create'])->name('spp.create');
Route::post('/sstore', [App\Http\Controllers\SppController::class, 'store'])->name('spp.store');
Route::get('/sedit/{id_spp}', [App\Http\Controllers\SppController::class, 'edit'])->name('spp.edit');
Route::post('/supdate/{id_spp}', [App\Http\Controllers\SppController::class, 'update'])->name('spp.update');
Route::delete('/sdelete/{id_spp}', [App\Http\Controllers\SppController::class, 'destroy'])->name('spp.delete');

//PETUGAS
Route::get('/pindex', [App\Http\Controllers\PetugasController::class, 'index'])->name('petugas.index');
Route::get('/pcreate', [App\Http\Controllers\PetugasController::class, 'create'])->name('petugas.create');
Route::post('/pstore', [App\Http\Controllers\PetugasController::class, 'store'])->name('petugas.store');
Route::get('/pedit/{id_petugas}', [App\Http\Controllers\PetugasController::class, 'edit'])->name('petugas.edit');
Route::post('/pupdate/{id_petugas}', [App\Http\Controllers\PetugasController::class, 'update'])->name('petugas.update');
Route::delete('/pdelete/{id_petugas}', [App\Http\Controllers\PetugasController::class, 'destroy'])->name('petugas.delete');

//Siswa
Route::get('/ssindex', [App\Http\Controllers\SiswaController::class, 'index'])->name('siswa.index');
Route::get('/sscreate', [App\Http\Controllers\SiswaController::class, 'create'])->name('siswa.create');
Route::post('/ssstore', [App\Http\Controllers\SiswaController::class, 'store'])->name('siswa.store');
Route::get('/ssedit/{nisn}', [App\Http\Controllers\SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/ssupdate/{nisn}', [App\Http\Controllers\SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/ssdelete/{nisn}', [App\Http\Controllers\SiswaController::class, 'destroy'])->name('siswa.delete');
