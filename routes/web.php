<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;

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
