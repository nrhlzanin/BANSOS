<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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


// beranda
Route::get("/", fn () => view("main.home", [
    "informasi" => Informasi::latest()->get()
]));

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');

// daftar penerima
Route::get("/penerima", [DashboardController::class, "daftarPenerima"])->middleware("auth");

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

Route::get('/admin', function () {
    return view('RW.dashboardrw');
})->name('RW.dashboardrw')->middleware(['auth', 'rw:rw']);

Route::get('/petugas', function () {
    return view('dashboard.dashboardrt');
})->name('dashboard.dashboardrt')->middleware(['auth', 'rt:rt']);

Route::group(['prefix' => 'user'], function (){
    Route::get('/', [UserController::class, 'index']);          //Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);      // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         // Menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     // Menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus data user
});

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
Route::get('/subkriteria/{kriteria}/create', SubkriteriaCreate::class)->name('subkriteria.create');

// route penilaian
Route::get('/penilaian', PenilaianIndex::class)->name('penilaian.index');
Route::get('/penilaian/{altId}/edit', PenilaianEdit::class)->name('penilaian.edit');
Route::get('/penilaian/proses', ProsesIndex::class)->name('penilaian.proses');
