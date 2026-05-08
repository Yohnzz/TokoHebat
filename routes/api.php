<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::prefix('admin')->group(function(){
    Route::apiResource('/kategori', KategoriController::class);
    Route::apiResource('/produk', ProdukController::class);
});

Route::get('/kategori', [KategoriController::class,'index']);
Route::get('/kategori/{id}', [KategoriController::class,'show']);
Route::get('/produk', [ProdukController::class,'index']);
Route::get('/produk/{id}', [ProdukController::class,'show']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
});


