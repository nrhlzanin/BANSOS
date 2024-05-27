<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidasiController;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Alternatif\Index as AlternatifIndex;
use App\Http\Livewire\Alternatif\Create as AlternatifCreate;
use App\Http\Livewire\Alternatif\Edit as AlternatifEdit;
use App\Http\Livewire\Kriteria\Index as KriteriaIndex;
use App\Http\Livewire\Kriteria\Create as KriteriaCreate;
use App\Http\Livewire\Kriteria\Edit as KriteriaEdit;
use App\Http\Livewire\Penilaian\Index as PenilaianIndex;
use App\Http\Livewire\Penilaian\Edit as PenilaianEdit;
use App\Http\Livewire\Subkriteria\Create as SubkriteriaCreate;
use App\Http\Livewire\Proses\Index as ProsesIndex;
use App\Models\SubKriteria;

// beranda
Route::get("/", function () {
    return view("main.home", [
        "informasi" => Informasi::latest()->get()
    ]);
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// daftar penerima
// Route::get("/penerima", [DashboardController::class, "daftarPenerima"])->middleware("auth");

// warga
Route::get("/dashboard/warga/bantuan", [DashboardController::class, 'bantuan'])->middleware("warga");
Route::get("/dashboard/warga/detail/{penerima:id}", [DashboardController::class, 'detailBantuan'])->middleware("warga");
Route::put("/dashboard/warga/bantuan/{penerima:id}", [DashboardController::class, 'updateBantuanRoleWarga'])->middleware("warga");
Route::get("/dashboard/warga/laporan", [DashboardController::class, 'create'])->middleware("warga");
Route::post("/dashboard/warga/laporan", [DashboardController::class, 'store'])->middleware("warga");
Route::get("/dashboard/warga/history", [DashboardController::class, 'historyRoleWarga'])->middleware("warga");
Route::get("/dashboard/warga/history/detail/{penerima:id}", [DashboardController::class, 'detailHistoryRoleWarga'])->middleware("warga");
Route::middleware('warga')->group(function () {
    Route::prefix('dashboard/warga/profile')->group(function () {
        Route::get('index', [ProfileController::class, 'index'])->name('dashboard.warga.profile.index');
        Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// admin
Route::get("/dashboard/admin/laporan", [DashboardController::class, 'show'])->middleware("admin");
Route::get("/dashboard/admin/laporan/{laporan:id}", [DashboardController::class, 'detail'])->middleware("admin");
Route::delete("/dashboard/admin/laporan/{laporan:id}", [DashboardController::class, 'destroy'])->middleware("admin");
Route::get("/dashboard/admin/penerima", [DashboardController::class, 'penerimaRoleAdmin'])->middleware("admin");
Route::get("/dashboard/admin/penerima/detail/{penerima:id}", [DashboardController::class, 'penerimaRoleAdminDetail'])->middleware("admin");
Route::get("/dashboard/admin/arsip", [DashboardController::class, 'arsip'])->middleware("admin");
Route::get("/dashboard/admin/arsip/detail/{penerima:id}", [DashboardController::class, 'detailArsip'])->middleware("admin");
Route::resource("/dashboard/admin/informasi", DashboardInfoController::class)->middleware("admin");

// desa
Route::get("/dashboard/desa/penerima", [DashboardController::class, 'penerimaRoleDesa'])->middleware("desa");
Route::put("/dashboard/desa/penerima/{penerima:id}", [DashboardController::class, 'updateBantuanRoleDesa'])->middleware("desa");
Route::get("/dashboard/desa/penerima/detail/{penerima:id}", [DashboardController::class, 'penerimaRoleDesaDetail'])->middleware("desa");
Route::get("/dashboard/desa/history", [DashboardController::class, 'historyRoleDesa'])->middleware("desa");
Route::get("/dashboard/desa/history/detail/{penerima:id}", [DashboardController::class, 'detailHistoryRoleDesa'])->middleware("desa");
////////////////////////////////////////////////////////////////////////////////////////////////

//Route RW coba
Route::prefix('admin')->middleware(['auth', 'role:rw'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    
    Route::get('/data-warga', [AdminController::class, 'dataWarga'])->name('admin.data-warga');
    Route::get('/data-warga/penerima', [AdminController::class, 'create'])->name('admin.data-warga.create');
    Route::get('/informasi-akun', [AdminController::class, 'informasiAkun'])->name('admin.informasi-akun');
    Route::get('/validasi', [AdminController::class, 'validasi'])->name('admin.validasi');
    Route::get('/informasi-bansos', [AdminController::class, 'informasiBansos'])->name('admin.informasi-bansos');
    Route::get('/data-warga/validasi', [AdminController::class, 'validasiData'])->name('admin.data-warga.validation');
    
});
//Route RT
Route::prefix('petugas')->middleware(['auth', 'role:rt'])->group(function () {

});

//route RW
// Route::get('/data-warga', [App\Http\Controllers\AdminController::class, 'dataWarga'])->name('data-warga');
// Route::get('/data-warga/penerima', [AdminController::class, 'create']);
// //Route::get('/data-warga/edit-penerima/{penerima_bansos:id}',)
// Route::get('/informasi-akun', [App\Http\Controllers\AdminController::class, 'informasiAkun'])->name('informasi-akun');
// Route::get('/validasi', [AdminController::class, 'validasi'])->name('validasi');
// Route::get('/informasi-bansos', [AdminController::class, 'informasiBansos'])->name('index');

// route data alternatif index
Route::get('/alternatif', AlternatifIndex::class)->name('alternatif.index');
// route data alternatif create
Route::get('/alternatif/create', AlternatifCreate::class)->name('alternatif.create');
// route data alternatif edit
Route::get('/alternatif/{id}/edit', AlternatifEdit::class)->name('alternatif.edit');

// route data kriteria
Route::get('/kriteria', KriteriaIndex::class)->name('kriteria.index');
Route::get('/kriteria/create', KriteriaCreate::class)->name('kriteria.create');
Route::get('/kriteria/{id}/edit', KriteriaEdit::class)->name('kriteria.edit');

// route data sub kriteria
// Route definition
Route::get('/subkriteria/{kriteria}/create', SubkriteriaCreate::class)->name('subkriteria.create');

// route penilaian
Route::get('/penilaian', PenilaianIndex::class)->name('penilaian.index');
Route::get('/penilaian/{altId}/edit', PenilaianEdit::class)->name('penilaian.edit');
Route::get('/penilaian/proses', ProsesIndex::class)->name('penilaian.proses');
