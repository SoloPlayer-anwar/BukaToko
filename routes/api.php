<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\GudangController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\DaftarSellerController;
use App\Http\Controllers\API\KeranjangController;
use App\Http\Controllers\API\KomentarController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RajaOngkirController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UploadStatusController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [UserController::class, 'getUser']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('user', [UserController::class, 'updateUser']);
    Route::post('user/avatar', [UserController::class, 'upload']);
    Route::get('transaction', [TransactionController::class, 'transaction']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
    Route::get('cart', [KeranjangController::class, 'getCart']);
    Route::post('cart', [KeranjangController::class, 'addCart']);
    Route::post('cartUpdate/{id}', [KeranjangController::class, 'updateCart']);
    Route::post('cartDelete/{id}', [KeranjangController::class, 'deleteCart']);
}) ;

Route::post('login',[UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('category', [CategoryController::class,'all']);
Route::get('gudang', [GudangController::class,'all']);
Route::get('role', [UserController::class, 'alluser']);
Route::get('komentar', [KomentarController::class, 'all']);
Route::post('post-komentar', [KomentarController::class, 'postKomentar']);
Route::post('photo-comment', [KomentarController::class, 'uploadKomentar']);
Route::post('daftar-seller', [DaftarSellerController::class, 'daftarSeller']);
Route::get('product', [ProductController::class, 'product']);
Route::get('ongkir', [RajaOngkirController::class, 'ongkir']);
Route::get('upload-status', [UploadStatusController::class, 'uploadStatus']);

Route::post('midtrans/callback', [MidtransController::class, 'callback']);




