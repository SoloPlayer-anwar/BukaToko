<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DaftarSellerController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UploadStatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\KeranjangController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware'=>['auth', 'admin']], function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('template', 'layouts.bootstrap');
Route::resource('users', UserController::class);
Route::resource('raja_ongkir', RajaOngkirController::class);
Route::resource('upload_status', UploadStatusController::class);
Route::resource('daftar_seller', DaftarSellerController::class);
Route::resource('komentar',KomentarController::class);
Route::resource('product', ProductController::class);
Route::resource('gudang', GudangController::class);
Route::resource('category', CategoryController::class);
Route::resource('transaction', TransactionController::class);
Route::get('transaction/{id}/status/{status}', [TransactionController::class, 'changeStatus'])->name('transaction.changeStatus');
Route::resource('keranjang', KeranjangController::class);
});

Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
Route::get('midtrans/error', [MidtransController::class, 'error']);



