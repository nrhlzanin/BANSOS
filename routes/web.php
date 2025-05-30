<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SpkController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;
use App\Models\BansosModel;
use App\Models\PengajuanModel;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



// beranda
Route::get("/", [LandingController::class, 'index']);

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// daftar penerima
// Route::get("/penerima", [DashboardController::class, "daftarPenerima"])->middleware("auth");

// Route RW
Route::prefix('admin')->middleware(['auth', 'role:rw'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/data-alternatif-warga', [AdminController::class, 'dataAlternatif'])->name('admin.data-alternatif');
    Route::get('/data-alternatif-warga/{id}', [AdminController::class, 'showDataAlternatif'])->name('admin.data-alternatif.show');
    Route::put('/data-alternatif-warga/to/penerima', [AdminController::class, 'updateAlternativeToHaveBansos'])->name('admin.data-alternatif.to.penerima');
    Route::get('/data-warga', [AdminController::class, 'dataWarga'])->name('admin.data-warga');
    Route::get('/data-warga/{id}', [AdminController::class, 'show'])->name('admin.data-warga.show');
    Route::get('/informasi-akun', [InformasiController::class, 'index'])->name('admin.informasi.informasi-akun');
    Route::get('/validasi', [AdminController::class, 'validasi'])->name('admin.validasi');
    Route::get('/data-warga/validasi', [AdminController::class, 'validasiData'])->name('admin.data-warga.validation');
    
    // Route SPK
    // Route::get('/perankingan', [SpkController::class, 'calculatePSI'])->name('admin.spk.menu');
    Route::put('/kriteria/update/{id}', [SpkController::class, 'update'])->name('spk.modal.editKriteria');
    Route::post('/kriteria/create', [SpkController::class, 'store'])->name('spk.modal.createKriteria');
    Route::get('kriteria/create', [SpkController::class, 'perankingan'])->name('spk.modal.createKriteria.get');
    Route::delete('/kriteria/delete/{id}', [SpkController::class, 'destroy'])->name('kriteria.delete');
    Route::get('kriteria/{kriteria}/createSubKriteria', [SpkController::class, 'createSubKriteria'])->name('kriteria.createSubKriteria');
    Route::post('kriteria/{kriteria}/storeSubKriteria', [SpkController::class, 'storeSubKriteria'])->name('kriteria.storeSubKriteria');
    Route::put('/kriteria/{kriteria}/subkriteria/{subkriteria}', [SpkController::class, 'editSubKriteria'])->name('kriteria.updateSubKriteria');
    Route::get('/perangkingan', [SpkController::class, 'perangkingan'])->name('perangkingan.index');
    
    Route::get('/informasi-bansos', [BansosController::class, 'index'])->name('admin.informasi-bansos');
    Route::get('/informasi-bansos/addBansos', [BansosController::class, 'create'])->name('admin.informasi-bansos.addBansos');
    Route::post('/informasi-bansos', [BansosController::class, 'store'])->name('admin.informasi-bansos.store');
    Route::get('/informasi-bansos/show/{id}', [BansosController::class, 'show'])->name('admin.informasi-bansos.show');
    Route::get('/informasi-bansos/{id}/edit', [BansosController::class, 'edit'])->name('admin.informasi-bansos.edit');
    Route::put('/informasi-bansos/{id}', [BansosController::class, 'update'])->name('admin.informasi-bansos.update');
    Route::delete('/informasi-bansos/{id}', [BansosController::class, 'destroy'])->name('admin.informasi-bansos.destroy');
});
// Route RT
Route::get('petugas', [PetugasController::class, 'index'])->middleware(['auth', 'role:rt']);
Route::prefix('petugas')->group(function () {
    Route::get('/data-pengajuan', [PengajuanController::class, 'dataPengajuanRT'])->name('petugas.data-pengajuan');
    Route::get('/data-pengajuan/show/{id}', [PengajuanController::class, 'show'])->name('petugas.data-pengajuan.detail');
    Route::put('/data-pengajuan/{id}/validate', [PengajuanController::class, 'validatePengajuan'])->name('data-pengajuan.validasi');
    Route::delete('/data-pengajuan/delete{id}', [PengajuanController::class, 'destroy'])->name('petugas.data-pengajuan.destroy');
    Route::get('/informasi-akun', [AkunController::class, 'akunPetugas'])->name('petugas.infomasi-akunrt');
    Route::get('/informasi-bansos', [BansosController::class, 'bansosrt'])->name('petugas.bansosrt');
    Route::get('/informasi-bansos/show/{id}', [BansosController::class, 'showrt'])->name('petugas.bansosrt.show');

    // Routes for user CRUD
    Route::get('/data-akun-warga', [AkunController::class, 'index'])->name('petugas.data-akun-warga');
    Route::get('/data-akun-warga/add', [AkunController::class, 'create'])->name('petugas.data-akun-warga.create');
    Route::post('/data-akun-warga', [AkunController::class, 'store'])->name('petugas.data-akun-warga.store');
    Route::get('/data-akun-warga/show/{id}', [AkunController::class, 'show'])->name('petugas.data-akun-warga.show');
    Route::get('/data-akun-warga/{id}/edit', [AkunController::class, 'edit'])->name('petugas.data-akun-warga.edit');
    Route::put('/data-akun-warga/update/{id}', [AkunController::class, 'update'])->name('petugas.data-akun-warga.update');
    Route::delete('/data-akun-warga/delete/{id}', [AkunController::class, 'destroy'])->name('petugas.data-akun-warga.destroy');
});
// Route Warga
Route::get('warga', [WargaController::class, 'index'])->middleware('auth', 'auth.session', 'role:warga');
Route::prefix('warga')->group(function () {
    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('warga.pengajuan.create');
    Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('warga.pengajuan.store');
    Route::get('/profil', [AkunController::class, 'akunWarga'])->name('warga.akun.index');
    Route::get('/statusPenerima', [PengajuanController::class, 'status'])->name('warga.pengajuan.status');
    
});


//Route::get('/data-warga/edit-penerima/{penerima_bansos:id}',)
Route::get('/informasi-akun', [App\Http\Controllers\AdminController::class, 'informasiAkun'])->name('informasi-akun');
Route::get('/validasi', [AdminController::class, 'validasi'])->name('validasi');
Route::get('/informasi-bansos', [AdminController::class, 'informasiBansos'])->name('index');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');