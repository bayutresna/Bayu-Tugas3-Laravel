<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('template');
}) ->name('homepage');

Route::any('/login', [AuthController::class, 'login']) -> name('login')->middleware(['noauth']);
Route::any('/logout', [AuthController::class, 'logout']) ->name('logout')->middleware(['withauth']);

Route::prefix('produk')->group(function(){
    Route::get('/',[ProdukController::class, "index"])->name("produk.index");
    Route::get('/create',[ProdukController::class, "create"])->name("produk.create")->middleware(['withauth']);
    Route::get('/edit/{id}',[ProdukController::class, "edit"])->name("produk.edit")->middleware(['withauth']);


    Route::post('/insert', [ProdukController::class, "insert"])->name("produk.insert")->middleware(['withauth']);
    Route::put('/update/{id}',[ProdukController::class, "update"])->name("produk.update")->middleware(['withauth']);

    Route::get('/delete/{id}', [ProdukController::class, "delete"])->name('produk.delete')->middleware(['withauth']);
});

Route::prefix('blog')->group(function(){
    Route::get('/',[BlogController::class, "index"])->name("blog.index");
    Route::get('/create',[BlogController::class, "create"])->name("blog.create");
    Route::get('/edit/{id}',[BlogController::class, "edit"])->name("blog.edit");
    Route::get('/detail/{id}', [BlogController::class,'detail'])->name("blog.detail");

    Route::post('/insert', [BlogController::class, "insert"])->name("blog.insert");
    Route::put('/update/{id}',[BlogController::class, "update"])->name("blog.update");

    Route::get('/delete/{id}', [BlogController::class, "delete"])->name('blog.delete');
});
