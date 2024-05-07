<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardInfoController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Informasi;
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

// beranda
Route::get("/", fn () => view("main.home", [
    "informasi" => Informasi::latest()->get()
]));

// detail informasi
Route::get("/informasi/{informasi:id}", [InformasiController::class, "show"]);

// daftar penerima
Route::get("/penerima", [DashboardController::class, "daftarPenerima"])->middleware("auth");

// login & logout
Route::get("/login", [LoginController::class, "index"])->name("login")->middleware("guest");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);

// register
Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);

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
