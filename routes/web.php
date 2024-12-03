<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangJasaController;
use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\DataServisController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\TandaTerimaController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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
//     return view('dashboard');
// })->middleware('auth');

// Route::get('/teknisi', function () {
//     return view('dashboard-teknisi');
// })->middleware('auth');

// Route Guest / Tamu di Web Saya
Route::group(['middleware' => 'guest'], function () {
    //Login
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('proses-login');

    //register
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('register.save');
});

//ini untuk menangkap user login yang mana itu bisa diakses di kedus role
Route::group(['middleware' => 'checkrole: 1,2'], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [RedirectController::class, 'checkRole'])->name('checkRole.redirect');

    //Data Master
    //data barang dan jasa
    Route::get('/barangjasa', [BarangJasaController::class, 'index'])->name('barangjasa');
    Route::get('/addbarangjasa', [BarangJasaController::class, 'create']);
    Route::post('/storebarangjasa', [BarangJasaController::class, 'store']);
    Route::get('/editbarangjasa/{id}', [BarangJasaController::class, 'edit']);
    Route::post('/updatebarangjasa/{id}', [BarangJasaController::class, 'update']);
    Route::delete('/delete-barang-jasa/{id}', [BarangJasaController::class, 'destroy'])->name('delete-barang-jasa');
    //PDF
    Route::get('/pdfbarangjasa', [BarangJasaController::class, 'pdfbarangjasa']);


    //tanda terima
    // Route::get('/addtandaterima', [TandaTerimaController::class, 'create'])->name('addtandaterima');
    Route::post('/storetandaterima', [TandaTerimaController::class, 'store']);
    Route::get('/tandaterima/{id}', [TandaTerimaController::class, 'show'])->name('tandaterima.show');
    //Cetak
    route::get('/cetak_tandaterima/{id}', [TandaTerimaController::class, 'cetak_tandaterima'])->name('cetak.tandaterima');


    //Data Servis
    Route::get('/dataservis/status/baru', [DataServisController::class, 'index'])->name('dataservis.baru');
    Route::get('/dataservis/status/diproses', [DataServisController::class, 'dataservisDiproses'])->name('dataservis.diproses');
    Route::get('/dataservis/status/selesai', [DataServisController::class, 'dataservisSelesai'])->name('dataservis.selesai');
    Route::get('/dataservis/status/batal', [DataServisController::class, 'dataservisBatal'])->name('dataservis.batal');
    Route::get('/dataservis/status/diambil', [DataServisController::class, 'dataservisDiambil'])->name('dataservis.diambil');
    Route::put('/data-servis/{id}/update-status', [DataServisController::class, 'updateStatus'])->name('data-servis.update-status');
    //Tambah Barang
    Route::get('/add-data-servis/{id}', [DataServisController::class, 'addItemDataServis'])->name('add-data-servis');
    //Alasan Pembatalan
    Route::get('data-servis/{id}/pembatalan', [DataServisController::class, 'tampilanPembatalan'])->name('data_servis.tampilanPembatalan');
    Route::post('data-servis/{id}/pembatalan', [DataServisController::class, 'storePembatalan'])->name('data_servis.storePembatalan');
    //PDF Data Servis
    route::get('/pdf_data_servis', [DataServisController::class, 'pdfDataServis'])->name('pdf_data_servis');
    //Update dan Edit
    Route::get('/edit_dataservis/{id}', [DataServisController::class, 'edit']);
    Route::post('/update_dataservis/{id}', [DataServisController::class, 'update']);
    //Delete
    Route::delete('/delete-data-servis/{id}', [DataServisController::class, 'destroy'])->name('delete-data-servis');
    //Proses Transaksi
    Route::get('/data-servis/{id}/servis-selesai', [DataServisController::class, 'servisSelesai'])->name('data-servis.servis-selesai');
    //Email
    Route::post('/kirim-email-servis/{id}', [DataServisController::class, 'kirimEmail'])->name('kirimEmailServis');


    //Pengambilan
    Route::get('/add_pengambilan', [PengambilanController::class, 'addPengambilan'])->name('add_pengambilan');
    Route::post('/selesai_pengambilan', [PengambilanController::class, 'store'])->name('selesai_pengambilan');
    //Cetak Nota Transaksi
    Route::get('/nota_transaksi/{id}', [PengambilanController::class, 'notaTransaksi'])->name('nota_transaksi');
    Route::get('/cetak_nota/{id}', [PengambilanController::class, 'cetakNota'])->name('cetak_nota');


    //Transaksi
    //Riwayat Transaksi
    Route::post('/add-barang-jasa/{id}', [TransaksiController::class, 'store'])->name('add-barang-jasa');
    Route::get('/delete-barangjasa-transaksi/{id}', [TransaksiController::class, 'delete_BarangJasa'])->name('delete-barangjasa-transaksi');
    //Delete Riwayat Transaksi
    Route::delete('/delete-riwayat-transaksi/{id}', [TransaksiController::class, 'destroy'])->name('delete-riwayat-transaksi');
    //PDF Riwayat Transaksi
    Route::get('pdf_transaksi', [TransaksiController::class, 'pdfTransaksi']);


    //Laporan Bulanan Teknisi
    route::get('/laporan_perteknisi', [LaporanController::class, 'laporanPerTeknisi'])->name('laporan_perteknisi');
    //PDF
    Route::get('/pdf_laporan_perteknisi', [LaporanController::class, 'pdf_laporan_PerTeknisi'])->name('pdf_laporan_perteknisi');
});

// admin route middleware | 1 role saja yaitu admin
Route::group(['middleware' => 'checkrole: 1'], function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');

    //Data User
    Route::get('/datauser', [UserController::class, 'index'])->name('datauser');
    Route::get('/add', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::post('/update/password/{id}', [UserController::class, 'updatePassword']);
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    //PDF
    Route::get('/pdf', [UserController::class, 'pdf']);

    //Data Master
    //data pelanggan
    Route::get('/datapelanggan', [DataPelangganController::class, 'index'])->name('datapelanggan');
    Route::get('/addpelanggan', [DataPelangganController::class, 'create']);
    Route::post('/storepelanggan', [DataPelangganController::class, 'store']);
    Route::get('/editpelanggan/{id}', [DataPelangganController::class, 'edit']);
    Route::post('/updatepelanggan/{id}', [DataPelangganController::class, 'update']);
    Route::delete('/delete-pelanggan/{id}', [DataPelangganController::class, 'destroy'])->name('delete-pelanggan');
    //PDF
    Route::get('/pdfpelanggan', [DataPelangganController::class, 'pdfpelanggan']);

    //data jenis barang
    Route::get('/jenisbarang', [JenisBarangController::class, 'index'])->name('jenisbarang');
    Route::get('/addjenisbarang', [JenisBarangController::class, 'create']);
    Route::post('/storejenisbarang', [JenisBarangController::class, 'store']);
    Route::get('/editjenisbarang/{id}', [JenisBarangController::class, 'edit']);
    Route::post('/updatejenisbarang/{id}', [JenisBarangController::class, 'update']);
    Route::delete('/delete-jenis-barang/{id}', [JenisBarangController::class, 'destroy'])->name('delete-jenis-barang');
    //PDF
    Route::get('/pdfjenisbarang', [JenisBarangController::class, 'pdfjenisbarang']);


    //tanda terima Akses Web
    Route::get('/tandaterima', [TandaTerimaController::class, 'index'])->name('tandaterima');


    //Pengambilan Akses Web
    Route::get('/pengambilan', [PengambilanController::class, 'index'])->name('pengambilan');


    //Riwayat Transaksi Akses Web
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');


    //Laporan Bulanan Admin
    route::get('/laporan_servis', [LaporanController::class, 'laporanServis'])->name('laporan_servis');
    route::get('/laporan_transaksi', [LaporanController::class, 'laporanTransaksi'])->name('laporan_transaksi');
    //PDF
    Route::get('/pdf_laporan_servis', [LaporanController::class, 'pdf_laporan_Servis'])->name('pdf_laporan_servis');
    Route::get('/pdf_laporan_transaksi', [LaporanController::class, 'pdf_laporan_Transaksi'])->name('pdf_laporan_transaksi');
});


// teknisi route middleware | 1 role saja yaitu teknisi
Route::group(['middleware' => 'checkrole: 2'], function () {
    Route::get('/teknisi', [TeknisiController::class, 'teknisi'])->name('teknisi.dashboard');
});
