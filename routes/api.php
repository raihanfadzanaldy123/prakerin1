<?php

use App\Models\provinsi;
use App\Models\jumlahKasus;
use App\Models\rw;
use App\Http\Controllers\Api\provinsiController;
use App\Http\Controllers\Api\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('provinsi', [provinsiController::class, 'index']);
Route::get('indonesia', [ApiController::class, 'indo']);
Route::get('indonesia/provinsi{id}', [ApiController::class, 'show']);

Route::get('indonesia/provinsi', [ApiController::class, 'provinsi']);
Route::get('indonesia/kota', [ApiController::class, 'kota']);
Route::get('indonesia/kecamatan', [ApiController::class, 'kecamatan']);
Route::get('indonesia/kelurahan', [ApiController::class, 'kelurahan']);


Route::get('global', [ApiController::class, 'testAPI']);