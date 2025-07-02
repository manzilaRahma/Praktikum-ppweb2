<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Manzilah Rahmah',
        'prodi' => 'Sistem Informasi'
    ]);
});

Route::get('/salam', function () {
    return 'Assalamualaikum wr.wb';
});

Route::get('/salam/{name}', function ($name) {
    return "Assalamualaikum wr.wb $name";
});

Route::get('/about', function () {
    return view('about', [
        'nama' => 'Manzilah Rahmah',
        'prodi' => 'Sistem Informasi'
    ]);
});

Route::get('/salam', function () {
    return 'Assalamualaikum wr.wb';
});

Route::get('produk', function () {
    return view('produk.index');
});

Route::get('produk/{id}', function ($id) {
    return view('produk.index', ['idproduk'=>$id]);
});

use App\Http\Controllers\ProdiController;
Route::get('/prodi',[ProdiController::class, 'show'])->name('prodi.show');


Route::get('/pasien/show', [PasienController::class, 'show']);

Route::get('/pasien/index', [Pasiencontroller::class, 'index'])->name('pasien.index');

Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');

Route::get('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');

Route::get('/admin',[AdminController::class, 'index'])->name('admin');




