<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\WargaController;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;

use App\Models\Kriteria;
use App\Models\SubKriteria;



// beranda
Route::get("/", function () {
    return view("landing.index");
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// daftar penerima
// Route::get("/penerima", [DashboardController::class, "daftarPenerima"])->middleware("auth");


// Route RW coba
Route::prefix('admin')->middleware(['auth', 'role:rw'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    
    Route::get('/data-warga', [AdminController::class, 'dataWarga'])->name('admin.data-warga');
    Route::get('/data-warga/penerima', [AdminController::class, 'create'])->name('admin.data-warga.create');
    Route::get('/informasi-akun', [AdminController::class, 'informasiAkun'])->name('admin.informasi-akun');
    Route::get('/validasi', [AdminController::class, 'validasi'])->name('admin.validasi');
    Route::get('/informasi-bansos', [AdminController::class, 'informasiBansos'])->name('admin.informasi-bansos');
    Route::get('/data-warga/validasi', [AdminController::class, 'validasiData'])->name('admin.data-warga.validation');
    Route::get('/perankingan', [SpkController::class, 'perankingan'])->name('admin.spk.menu');



});
// Route RT
Route::get('petugas', [PetugasController::class, 'index'])->middleware(['auth', 'role:rt']);
Route::prefix('petugas')->group(function() {
    Route::get('/data-warga', [PetugasController::class, 'dataWarga'])->name('petugas.data-wargart');
    Route::get('/informasi-akun', [PetugasController::class, 'informasiAkun'])->name('petugas.infomasi-akunrt');
});
// Route Warga
Route::get('warga', [WargaController::class, 'index'])->middleware('auth', 'role:warga');
Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Route RW
Route::get('/data-warga', [App\Http\Controllers\AdminController::class, 'dataWarga'])->name('data-warga');
Route::get('/data-warga/penerima/create', [App\Http\Controllers\AdminController::class, 'create'])->name('penerimas.create');
Route::get('/data-warga/penerima/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('penerimas.show');
Route::delete('/data-warga/penerima/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('penerimas.destroy');

//Route::get('/data-warga/edit-penerima/{penerima_bansos:id}',)
Route::get('/informasi-akun', [App\Http\Controllers\AdminController::class, 'informasiAkun'])->name('informasi-akun');
Route::get('/validasi', [AdminController::class, 'validasi'])->name('validasi');
Route::get('/informasi-bansos', [AdminController::class, 'informasiBansos'])->name('index');


