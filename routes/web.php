<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat datang di website Kampus PCR';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);{
}

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah', [MatakuliahController::class, 'index']);{
}

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

Route::get('/home', [HomeController::class, 'index'])->name('home');{
}

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/auth', [AuthController::class, 'index']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

Route::resource('user', UserController::class);

// Halaman Guest (belum login)
Route::middleware('guest')->group(function () {

    // Halaman Form Login
    Route::get('/auth', [AuthController::class, 'index'])->name('login');

    // Proses Submit Login
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

    // Halaman Depan
    Route::get('/', function () {
        return view('welcome');
    });
});

// Halaman Wajib Login
Route::middleware('auth')->group(function () {

    // Logout (Bisa diakses semua user yang login)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- Dashboard untuk User Biasa ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Contoh fitur user biasa: simpan pertanyaan
    Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');

    Route::get('/home', [HomeController::class, 'index']);

    // Khusus Admin
    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('pelanggan', PelangganController::class);
        });
    Route::get('/multipleuploads', 'MultipleuploadsController@index')->name('uploads');
    Route::post('/save', 'MultipleuploadsController@store')->name('uploads.store');
});
