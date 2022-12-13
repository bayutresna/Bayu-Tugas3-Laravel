<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\ProdukController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::prefix('pengguna')->group(function(){
    Route::get('/', [PenggunaController::class,'index']);
    Route::get('/{id}', [PenggunaController::class,'show']);
    Route::post('/', [PenggunaController::class,'store']);
    Route::put('/{id}', [PenggunaController::class,'update']);
    Route::delete('/{id}', [PenggunaController::class,'destroy']);
});

Route::prefix('produk')->group(function(){
    Route::get('/', [ProdukController::class,'index']);
    Route::get('/{id}', [ProdukController::class,'show']);
    Route::post('/', [ProdukController::class,'store']);
    Route::put('/{id}', [ProdukController::class,'update']);
    Route::delete('/{id}', [ProdukController::class,'destroy']);
});
