<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         'title' => 'Dashboard',
//     ]);
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('buku', BukuController::class); // CRUD menggunakan resource tidak perlu lagi kaya di atas
Route::resource('anggota', AnggotaController::class);

// grouping biar rapi
// Petugas
Route::controller(PetugasController::class)->group(function () {
    Route::get('/petugas', 'index')->name('petugas.index');
    Route::get('/petugas/tambah', 'tambah')->name('petugas.tambah');
    Route::post('/petugas/simpan', 'simpan')->name('petugas.simpan');
    Route::get('/petugas/{id}/edit', 'edit')->name('petugas.edit');
    Route::put('/petugas/{id}/simpan_edit', 'simpan_edit')->name('petugas.simpan_edit');
    Route::delete('/petugas/{id}/delete', 'delete')->name('petugas.delete');
});

// peminjaman
Route::resource('peminjaman', PeminjamanController::class);




// Petugas
// Route::resource('petugas', PetugasController::class);

// Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
// Route::get('/petugas/tambah', [PetugasController::class, 'tambah'])->name('petugas.tambah');
// Route::post('/petugas/simpan', [PetugasController::class, 'simpan'])->name('petugas.simpan');

// Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
// Route::put('/petugas/{id}/simpan_edit', [PetugasController::class, 'simpan_edit'])->name('petugas.simpan_edit');
// Route::delete('/petugas/{id}/delete', [PetugasController::class, 'delete'])->name('petugas.delete');

























// Route::delete('/agt/{id}/hapus', [Cagt::class, 'hapus'])->name('agt.hapus');
// Route::put('/agt/{id}/simpan_edit', [Cagt::class, 'simpan_edit'])->name('agt.simpan_edit');
// Route::get('/petugas/{id}/delete',[PetugasController::class,'delete'])->name('petugas.delete');
// Buat routing untuk menjalankan link edit diatas	
// 	Route::get('/agt/{id}/edit', [Cagt::class, 'edit'])->name('agt.edit');
