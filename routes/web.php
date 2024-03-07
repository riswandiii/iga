<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OpdController;
use App\Http\Controllers\Dashboard\UptdController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\DataPendukung;
use App\Http\Controllers\HarapPerhatikanController;
use App\Http\Controllers\HitungMundurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\InovasiMasyarakatController;
use App\Http\Controllers\InovasiPemerintahDaerahController;
use App\Http\Controllers\InovasiPemerintahDaerahDbController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManualBookController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PetunjukTeknisController;
use App\Http\Controllers\ProfilPemdaController;
use App\Http\Controllers\TematikController;
use App\Models\Inovasi_Pemerintah_Daerah;
use App\Models\InovasiMasyarakat;
use App\Policies\InovasiPemerintahDaerahPolicy;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

// Route::get('/storage-link', function(){
//     $targetFolder = base_path().'/storage/app/public';
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
//     symlink($targetFolder, $linkFolder);
// });

Route::group(['prefix' => ''], function(){
    Route::get('', [HomeController::class, 'index'])->name('index');
    Route::get('panduan', [HomeController::class, 'panduan'])->name('panduan');
    Route::get('pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');
    Route::get('dokumen', [HomeController::class, 'dokumen'])->name('dokumen');
});

// DashboardController
Route::prefix('dashboard')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'roles:Admin']], function(){
    // OpdController
    Route::get('opd', [OpdController::class, 'index'])->name('dashboard.opd');
    Route::get('opd/create', [OpdController::class, 'create'])->name('dashboard.opd.create');
    Route::post('opd', [OpdController::class, 'store'])->name('dashboard.opd.store');
    Route::get('opd/{id}', [OpdController::class, 'destroy'])->name('dashboard.opd.destroy');
    Route::get('opd/{opd:id}/edit', [OpdController::class, 'edit'])->name('dashboard.opd.edit');
    Route::put('opd/{opd:id}', [OpdController::class, 'update'])->name('dashboard.opd.update');

    // TematikCOntroller
    Route::get('tematik', [TematikController::class, 'index'])->name('dashboard.tematik');
    Route::get('tematik/create', [TematikController::class, 'create'])->name('dashboard.tematik.create');
    Route::post('tematik', [TematikController::class, 'store'])->name('dashboard.tematik.store');
    Route::get('tematik/{id}', [TematikController::class, 'destroy'])->name('dashboard.tematik.destroy');
    Route::get('tematik/{tematik:id}/edit', [TematikController::class, 'edit'])->name('dashboard.tematik.edit');
    Route::put('tematik/{tematik:id}', [TematikController::class, 'update'])->name('dashboard.tematik.update');

    // UptdController
    Route::get('uptd', [UptdController::class, 'index'])->name('dashboard.uptd');
    Route::get('/uptd/create', [UptdController::class, 'create'])->name('dashboard.uptd.create');
    Route::post('uptd', [UptdController::class, 'store'])->name('dashboard.uptd.store');
    Route::get('uptd/{id}', [UptdController::class, 'destroy'])->name('dashboard.uptd.destroy');
    Route::get('uptd/{id}/edit', [UptdController::class, 'edit'])->name('dashboard.uptd.edit');
    Route::put('uptd/{id}', [UptdController::class, 'update'])->name('dashboard.uptd.update');

    // UserController
    Route::get('account', [UserController::class, 'index'])->name('dashboard.account');
    Route::get('account/create', [UserController::class, 'create'])->name('dashboard.account.create');
    Route::post('account', [UserController::class, 'store'])->name('dashboard.account.store');
    Route::get('account/{id}', [UserController::class, 'destroy'])->name('dashboard.account.destroy');
    Route::get('account/{id}/edit', [UserController::class, 'edit'])->name('dashboard.account.edit');
    Route::put('account/{id}', [UserController::class, 'update'])->name('dashboard.account.update');
  

    // ProfilPemdaController
    Route::get('profil-pemda', [ProfilPemdaController::class, 'index'])->name('dashboard.profil_pemda');

    // HitungMundurController
    Route::get('hitung-mundur', [HitungMundurController::class, 'index'])->name('dashboard.hitung');
    Route::get('hitung-mundur/create', [HitungMundurController::class, 'create'])->name('dashboard.hitung.create');
    Route::post('hitung-mundur', [HitungMundurController::class, 'store'])->name('dashboard.hitung.store');
    Route::get('hitung-mundur/{id}/edit', [HitungMundurController::class, 'edit'])->name('dashboard.hitung.edit');
    Route::put('hitung-mundur/{id}', [HitungMundurController::class, 'update'])->name('dashboard.hitung.update');
    Route::get('hitung-mundur/{id}', [HitungMundurController::class, 'destroy'])->name('dashboard.hitung.destroy');

    // Pengumuman COntroller
    Route::get('pengumuman', [PengumumanController::class, 'index'])->name('dashboard.pengumuman');
    Route::get('pengumuman/create', [PengumumanController::class, 'create'])->name('dashboard.pengumuman.create');
    Route::post('pengumuman', [PengumumanController::class, 'store'])->name('dashboard.pengumuman.store');
    Route::get('pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('dashboard.pengumuman.edit');
    Route::put('pengumuman/{id}', [PengumumanController::class, 'update'])->name('dashboard.pengumuman.update');
    Route::get('pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('dashboard.pengumuman.destroy');


    // ManualBookController
    Route::get('manual-book', [ManualBookController::class, 'index'])->name('dashboard.manual.book');
    Route::get('manual-book/create', [ManualBookController::class, 'create'])->name('dashboard.manual.book.create');
    Route::post('manual-book', [ManualBookController::class, 'store'])->name('dashboard.manual.book.store');
    Route::get('manual-book/{id}/edit', [ManualBookController::class, 'edit'])->name('dashboard.manual.book.edit');
    Route::put('manual-book/{id}', [ManualBookController::class, 'update'])->name('dashboard.manual.book.update');
    Route::get('manual-book/{id}', [ManualBookController::class, 'destroy'])->name('dashboard.manual.book.destroy');

    // PetunjukTeknisController
    Route::get('petunjuk-teknis', [PetunjukTeknisController::class, 'index'])->name('dashboard.petunjuk.teknis');
    Route::get('petunjuk-teknis/create', [PetunjukTeknisController::class, 'create'])->name('dashboard.petunjuk.teknis.create');
    Route::post('petunjuk-teknis', [PetunjukTeknisController::class, 'store'])->name('dashboard.petunjuk.teknis.store');
    Route::get('petunjuk-teknis/{id}/edit', [PetunjukTeknisController::class, 'edit'])->name('dashboard.petunjuk.teknis.edit');
    Route::put('petunjuk-teknis/{id}', [PetunjukTeknisController::class, 'update'])->name('dashboard.petunjuk.teknis.update');
    Route::get('petunjuk-teknis/{id}', [PetunjukTeknisController::class, 'destroy'])->name('dashboard.petunjuk.teknis.destroy');

     // BannerController
     Route::get('banner', [BannerController::class, 'index'])->name('dashboard.banner');
     Route::get('banner/create', [BannerController::class, 'create'])->name('dashboard.banner.create');
     Route::post('banner', [BannerController::class, 'store'])->name('dashboard.banner.store');
     Route::get('banner/{id}/edit', [BannerController::class, 'edit'])->name('dashboard.banner.edit');
     Route::put('banner/{id}', [BannerController::class, 'update'])->name('dashboard.banner.update');
     Route::get('banner/{id}', [BannerController::class, 'destroy'])->name('dashboard.banner.destroy');

     // HarapPerhatikanController
    Route::get('perhatikan', [HarapPerhatikanController::class, 'index'])->name('dashboard.perhatikan');
    Route::get('perhatikan/{id}/edit', [HarapPerhatikanController::class, 'edit'])->name('dashboard.perhatikan.edit');
    Route::put('perhatikan/{id}', [HarapPerhatikanController::class, 'update'])->name('dashboard.perhatikan.update');

    // InovasiPemerintahDaerahDbCOntroller
    Route::get('download-semua-inovasi-daerah', [InovasiPemerintahDaerahDbController::class, 'downloadExcel'])->name('dashboard.semua.inovasi.daerah.excel');
    Route::get('export-to-zip', [InovasiPemerintahDaerahDbController::class, 'exportToZip'])->name('dashboard.semua.inovasi.daerah.pdf');

    // InovasiPemerintahDaerahController
    Route::get('download-pdf-zip/{id}', [InovasiPemerintahDaerahController::class, 'downloadPdfZip'])->name('download.pdf.zip');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'roles:Admin,Opd,Upt,Kepala Daerah,Anggota DPRD,ASN,Masyarakat']], function(){
    // InovasiPemerintahDaerahController
    Route::get('lomba-inovasi-daerah', [InovasiPemerintahDaerahController::class, 'index'])->name('dashboard.inovasi.daerah');
    Route::get('lomba-inovasi-daerah/create', [InovasiPemerintahDaerahController::class, 'create'])->name('dashboard.inovasi.daerah.create');
    Route::post('lomba-inovasi-daerah', [InovasiPemerintahDaerahController::class, 'store'])->name('dashboard.inovasi.daerah.store');
    Route::get('lomba-inovasi-daerah/{id}', [InovasiPemerintahDaerahController::class, 'destroy'])->name('dashboard.inovasi.daerah.destroy');
    Route::get('lomba-inovasi-daerah/{id}/edit', [InovasiPemerintahDaerahController::class, 'edit'])->name('dashboard.inovasi.daerah.edit');
    Route::put('lomba-inovasi-daerah/{id}', [InovasiPemerintahDaerahController::class, 'update'])->name('dashboard.inovasi.daerah.update');
    Route::get('download-inovasi/{id}', [InovasiPemerintahDaerahController::class, 'downloadPdf'])->name('dashboard.inovasi.daerah.pdf');
    Route::get('download-inovasi-excel/{id}', [InovasiPemerintahDaerahController::class, 'downloadExcel'])->name('dashboard.inovasi.daerah.excel');

     // IndiaktorController
     Route::get('lomba-inovasi-daerah/indikator/{id}', [IndikatorController::class, 'index'])->name('dashboard.indikator.index');
     Route::post('lomba-inovasi-daerah/indikator', [IndikatorController::class, 'CreateOrUpdate'])->name('dashboard.indikator.CreateOrUpdate');

    //  DataPendukung
    Route::get('dokumen-pendukung/lomba-inovasi-daerah', [DataPendukung::class, 'index'])->name('dashboard.dokumen.pendukung');
    Route::post('lomba-inovasi-daerah/dokumen-pendukung', [DataPendukung::class, 'store'])->name('dashboard.dokumen.pendukung.store');
    Route::get('lomba-inovasi-daerah/dokumen-pendukung/{id}', [DataPendukung::class, 'destroy'])->name('dashboard.dokumen.pendukung.destroy');

    // // InovasiMasyarakatController
    // Route::get('lomba-inovasi-masyarakat', [InovasiMasyarakatController::class, 'index'])->name('dashboard.inovasi.masyarakat');
    // Route::get('lomba-inovasi-masyarakat/create', [InovasiMasyarakatController::class, 'create'])->name('dashboard.inovasi.masyarakat.create');
    // Route::post('lomba-inovasi-masyarakat', [InovasiMasyarakatController::class, 'store'])->name('dashboard.inovasi.masyarakat.store');
    // Route::get('lomba-inovasi-masyarakat/{id}/edit', [InovasiMasyarakatController::class, 'edit'])->name('dashboard.inovasi.masyarakat.edit');
    // Route::put('lomba-inovasi-masyarakat/{id}', [InovasiMasyarakatController::class, 'update'])->name('dashboard.inovasi.masyarakat.update');
    // Route::get('download-inovasi-masyarakat/{id}', [InovasiMasyarakatController::class, 'downloadPdf'])->name('dashboard.inovasi.masyarakat.pdf');
    // Route::get('download-inovasi-masyarakat-excel/{id}', [InovasiMasyarakatController::class, 'downloadExcel'])->name('dashboard.inovasi.masyarakat.excel');
    // Route::get('lomba-inovasi-masyarakat/{id}', [InovasiMasyarakatController::class, 'destroy'])->name('dashboard.inovasi.masyarakat.destroy');

     // IndiaktorController
     Route::get('lomba-inovasi-masyarakat/indikator/{id}', [IndikatorController::class, 'indexx'])->name('dashboard.indikator.indexx');
     Route::post('lomba-inovasi-masyarakat/indikator', [IndikatorController::class, 'CreateOrUpdatee'])->name('dashboard.indikator.CreateOrUpdatee');

    //  Data Pendukung
    Route::get('dokumen-pendukung/lomba-inovasi-masyarakat', [DataPendukung::class, 'indexx'])->name('dashboard.dokumen.pendukungg');
    Route::post('lomba-inovasi-masyarakat/dokumen-pendukung', [DataPendukung::class, 'storee'])->name('dashboard.dokumen.pendukung.storee');
    Route::get('lomba-inovasi-masyarakat/dokumen-pendukung-/{id}', [DataPendukung::class, 'destroyy'])->name('dashboard.dokumen.pendukung.destroyy');

    // Root Faq / DashboardController
    Route::get('faq', [DashboardController::class, 'faq'])->name('dashboard.faq');

});


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'roles:Admin,Opd,Upt,Kepala Daerah,Anggota DPRD,ASN,Masyarakat']], function(){
    Route::get('inovasi-daerah', [InovasiPemerintahDaerahDbController::class, 'index'])->name('dashboard.inovasi.daerah.db');
});

// // LoginController
Route::group(['prefix' => '', 'middleware' => ['guest']], function() {
    Route::get('/log-in', [LoginController::class, 'showFormLogin'])->name('login');
    Route::post('/log-in', [LoginController::class, 'loginProses'])->name('login.proses');
    Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
});

Route::group(['prefix' => '', 'middleware' => ['auth']], function() {
    Route::get('log-out', [LoginController::class, 'logout'])->name('logout');
});

