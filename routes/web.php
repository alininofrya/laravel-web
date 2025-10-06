<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;

//alinniieee
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
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']); {
};

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/matakuliah', [MatakuliahController::class, 'index']); {
};

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']); {
}

Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');
