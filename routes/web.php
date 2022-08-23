<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\DataSantriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfiAdminController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\DataPendaftarController;
use App\Http\Controllers\Pengurus\PengurusController;
use App\Http\Controllers\Pengurus\NilaiKitabController;
use App\Http\Controllers\Pengurus\NilaiAlquranController;
use App\Http\Controllers\Pengurus\HasilTesKitabController;
use App\Http\Controllers\Pengurus\HasilTesAlquranController;
use App\Http\Controllers\Pengurus\ProfiPengurusController;
use App\Http\Controllers\User\CetakFormulirController;
use App\Http\Controllers\User\HasilTesController;
use App\Http\Controllers\User\PembayaranUserController;
use App\Models\NilaiAlquran;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
})->middleware('guest');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('guest');

Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::get('/register', [UserController::class, 'register'])->name('register');
        Route::get('/login', [UserController::class, 'login'])->name('login');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

        //crud profil siswa
        Route::get('/profile', [ProfilController::class, 'profil'])->name('profil');
        Route::get('/editprofile/{id}', [ProfilController::class, 'editprofile'])->name('editprofile');
        Route::post('/updateprofile/{id}', [ProfilController::class, 'updateprofile'])->name('updateprofile');

        //crud pembayaran siswa
        Route::get('/pembayaran', [PembayaranUserController::class, 'bukti'])->name('bukti');
        Route::post('/create', [PembayaranUserController::class, 'create'])->name('create');

        //crud Hasil Tes
        Route::get('/hasiltes', [HasilTesController::class, 'hasiltes'])->name('hasiltes');

        Route::get('/index', [CetakFormulirController::class, 'index'])->name('index');
        Route::get('/cetakformulir/{id}', [CetakFormulirController::class, 'cetakformulir'])->name('cetakformulir');
    });
});



Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/register', 'dashboard.admin.register')->name('register');
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::get('/dataPendaftar', [DataPendaftarController::class, 'dataPendaftar'])->name('dataPendaftar');
        Route::get('/delete/{id}', [DataPendaftarController::class, 'delete'])->name('delete');
        Route::get('/statusCS/{id}', [DataPendaftarController::class, 'statusCS'])->name('statusCS');
        Route::get('/tutupCS/{id}', [DataPendaftarController::class, 'tutupCS'])->name('tutupCS');

        //crud Data Santri
        Route::get('/dataSantri', [DataSantriController::class, 'dataSantri'])->name('dataSantri');
        // Route::get('/tambahData', [DataSantriController::class, 'tambahData'])->name('tambahData');
        Route::post('/insertData', [DataSantriController::class, 'insertData'])->name('insertData');
        Route::get('/editDS/{id}', [DataSantriController::class, 'editDS'])->name('editDS');
        Route::post('/update/{id}', [DataSantriController::class, 'update'])->name('update');
        Route::get('/deleteDS/{id}', [DataSantriController::class, 'deleteDS'])->name('deleteDS');
        Route::get('/cetakDS', [DataSantriController::class, 'cetakDS'])->name('cetakDS');


        //Crud Data Kelas
        Route::get('/kelas', [KelasController::class, 'kelas'])->name('kelas');
        Route::get('/tambahKelas', [KelasController::class, 'tambahKelas'])->name('tambahKelas');
        Route::post('/insertKelas', [KelasController::class, 'insertKelas'])->name('insertKelas');
        Route::get('/editKelas/{id}', [KelasController::class, 'editKelas'])->name('editKelas');
        Route::post('/updateKelas/{id}', [KelasController::class, 'updateKelas'])->name('updateKelas');
        Route::get('/deleteKelas/{id}', [KelasController::class, 'deleteKelas'])->name('deleteKelas');
        Route::get('/konfirmasiKelas/{id}', [KelasController::class, 'konfirmasiKelas'])->name('konfirmasiKelas');


        //Crud Pengumuman
        Route::get('/pengumuman', [PengumumanController::class, 'pengumuman'])->name('pengumuman');
        Route::get('/tambahPengumuman', [PengumumanController::class, 'tambahPengumuman'])->name('tambahPengumuman');
        Route::post('/insertPengumuman', [PengumumanController::class, 'insertPengumuman'])->name('insertPengumuman');
        Route::get('/edit/{id}', [PengumumanController::class, 'edit'])->name('edit');
        Route::post('/updatePengumuman/{id}', [PengumumanController::class, 'updatePengumuman'])->name('updatePengumuman');
        Route::get('/deletePengumuman/{id}', [PengumumanController::class, 'deletePengumuman'])->name('deletePengumuman');
        Route::get('/tutup/{id}', [PengumumanController::class, 'tutup'])->name('tutup');


        //Crud Pembayaran
        Route::get('/pembayaran', [PembayaranController::class, 'pembayaran'])->name('pembayaran');
        Route::get('/status/{id}', [PembayaranController::class, 'status'])->name('status');
        Route::get('/deleteTF/{id}', [PembayaranController::class, 'deleteTF'])->name('deleteTF');

        //Crud Tahun Ajaran
        Route::get('/tahunAjaran', [TahunAjaranController::class, 'tahunAjaran'])->name('tahunAjaran');
        Route::post('/insertTA', [TahunAjaranController::class, 'insertTA'])->name('insertTA');
        Route::post('/updateTA/{id}', [TahunAjaranController::class, 'updateTA'])->name('updateTA');
        Route::get('/deleteTA/{id}', [TahunAjaranController::class, 'deleteTA'])->name('deleteTA');
        Route::get('/konfirmasi/{id}', [TahunAjaranController::class, 'konfirmasi'])->name('konfirmasi');

        //Crud Nilai
        Route::get('/nilai', [NilaiController::class, 'nilai'])->name('nilai');
        Route::post('/updateNilaiA/{id}', [NilaiController::class, 'updateNilaiA'])->name('updateNilaiA');
        Route::post('/updateNilaiK/{id}', [NilaiController::class, 'updateNilaiK'])->name('updateNilaiK');
        Route::post('/updateKelasNilai/{id}', [NilaiController::class, 'updateKelasNilai'])->name('updateKelasNilai');
        Route::get('/deleteNilai/{id}', [NilaiController::class, 'deleteNilai'])->name('deleteNilai');
        Route::get('/nilai', [NilaiController::class, 'nilai'])->name('nilai');
        Route::get('/tutupNilai/{id}', [NilaiController::class, 'tutupNilai'])->name('tutupNilai');

        //crud profil Admin
        Route::get('/profile', [ProfiAdminController::class, 'profil'])->name('profil');
        Route::post('/updateprofileAdmin/{id}', [ProfiAdminController::class, 'updateprofileAdmin'])->name('updateprofileAdmin');

        //Crud Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});



Route::prefix('pengurus')->name('pengurus.')->group(function () {

    Route::middleware(['guest:pengurus', 'PreventBackHistory'])->group(function () {
        Route::view('/register', 'dashboard.pengurus.register')->name('register');
        Route::view('/login', 'dashboard.pengurus.login')->name('login');
        Route::post('/create', [PengurusController::class, 'create'])->name('create');
        Route::post('/check', [PengurusController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:pengurus', 'PreventBackHistory'])->group(function () {
        Route::get('/home', [PengurusController::class, 'home'])->name('home');
        Route::post('/logout', [PengurusController::class, 'logout'])->name('logout');

        //Crud Nilai Alquran
        Route::get('/nilaiAlquran', [NilaiAlquranController::class, 'nilaiAlquran'])->name('nilaiAlquran');
        Route::get('/statusNilaiA/{id}', [NilaiAlquranController::class, 'statusNilaiA'])->name('statusNilaiA');
        Route::post('/insertNilaiAlquran', [NilaiAlquranController::class, 'insertNilaiAlquran'])->name('insertNilaiAlquran');
        Route::get('/addNilaiAlquran/{id}', [NilaiAlquranController::class, 'addNilaiAlquran'])->name('addNilaiAlquran');
        Route::get('/deleteTesA/{id}', [NilaiAlquranController::class, 'deleteTesA'])->name('deleteTesA');


        //Crud Nilai Kitab
        Route::get('/nilaiKitab', [NilaiKitabController::class, 'nilaiKitab'])->name('nilaiKitab');
        Route::post('/insertNilaiKitab', [NilaiKitabController::class, 'insertNilaiKitab'])->name('insertNilaiKitab');
        Route::get('/addNilaiKitab/{id}', [NilaiKitabController::class, 'addNilaiKitab'])->name('addNilaiKitab');
        Route::get('/deleteTesK/{id}', [NilaiKitabController::class, 'deleteTesK'])->name('deleteTesK');


        //Crud Hasil Tes
        Route::get('/tesAlquran', [HasilTesAlquranController::class, 'tesAlquran'])->name('tesAlquran');
        Route::get('/tesKitab', [HasilTesKitabController::class, 'tesKitab'])->name('tesKitab');


        //crud profil Admin
        Route::get('/profil', [ProfiPengurusController::class, 'profilPengurus'])->name('profilPengurus');
        Route::post('/updateprofilePengurus/{id}', [ProfiPengurusController::class, 'updateprofilePengurus'])->name('updateprofilePengurus');
    });
});
