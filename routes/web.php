<?php

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
use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Auth;

Route::resource('/', FrontEndController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function () {
    return view('layouts.master');
});

Route::get('logout', '\App\Http\Controllers\auth\LoginController@logout');
Route::get('admin', [App\Http\Controllers\HomeController::class, 'index']);

use App\Http\Controllers\ProvinsiController;

Route::resource('admin/provinsi', ProvinsiController::class);


use App\Http\Controllers\KotaController;

Route::resource('admin/kota', KotaController::class);

use App\Http\Controllers\KecamatanController;

Route::resource('admin/kecamatan', KecamatanController::class);

use App\Http\Controllers\KelurahanController;

Route::resource('admin/kelurahan', KelurahanController::class);

use App\Http\Controllers\RwController;

Route::resource('admin/rw', RwController::class);

use App\Http\Controllers\JumlahKasusController;

Route::resource('admin/kasus', JumlahKasusController::class);
Route::view('dropdown', 'livewire.home');
