<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\NotaController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::delete('/transaksi/delete', [TransaksiController::class, 'delete'])->name('transaksi.delete');

    Route::get('/transaksi/add', [TransaksiController::class, 'add'])->name('transaksi.add');
    Route::post('/transaksi/add', [TransaksiController::class, 'store'])->name('transaksi.store');

    Route::get('/transaksi/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::post('/transaksi/edit', [TransaksiController::class, 'update'])->name('transaksi.update');


//customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::delete('/customer/delete', [CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('/customer/add', [CustomerController::class, 'add'])->name('customer.add');
    Route::post('/customer/add', [CustomerController::class, 'store'])->name('customer.store');

    Route::get('/customer/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/edit', [CustomerController::class, 'update'])->name('customer.update');


//kasir
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
    Route::delete('/kasir/delete', [KasirController::class, 'delete'])->name('kasir.delete');

    Route::get('/kasir/add', [KasirController::class, 'add'])->name('kasir.add');
    Route::post('/kasir/add', [KasirController::class, 'store'])->name('kasir.store');

    Route::get('/kasir/edit', [KasirController::class, 'edit'])->name('kasir.edit');
    Route::post('/kasir/edit', [KasirController::class, 'update'])->name('kasir.update');

//nota
    Route::get('/nota', [NotaController::class, 'index'])->name('nota.index');

});

//delete
Route::resource("customer", CustomerController::class);
Route::resource("kasir", KasirController::class);
Route::resource("transaksi", TransaksiController::class);

//soft delete
Route::post("transaksi/soft/{id}", [TransaksiController::class, "soft"])->name("transaksi.soft");
Route::post("kasir/soft/{id}", [KasirController::class, "soft"])->name("kasir.soft");
//   
// 
//
//

require __DIR__.'/auth.php';
