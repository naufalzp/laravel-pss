<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admins', [AdminController::class, 'store']);
Route::get('/admins/{id}', [AdminController::class, 'show']);
Route::put('/admins/{id}', [AdminController::class, 'update']);
Route::delete('/admins/{id}', [AdminController::class, 'destroy']);

Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers', [SupplierController::class, 'store']);
Route::get('/suppliers/{id}', [SupplierController::class, 'show']);
Route::put('/suppliers/{id}', [SupplierController::class, 'update']);
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/items', [ItemController::class, 'index']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::put('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);

// Menampilkan ringkasan stok barang termasuk stok total, total nilai stok dan rata-rata harga barang.

Route::get('/stockSummary', [ItemController::class, 'stockSummary']);

// Menampilkan daftar barang yang stoknya di bawah ambang batas tertentu.

Route::get('/lowStock/{threshold}', [ItemController::class, 'lowStockItems']);

/**
 * Menampilkan laporan barang berdasarkan kategori tertentu.
 */
Route::get('/getItemsByCategory/{categoryId}', [ItemController::class, 'getItemsByCategory']);

/**
 * Menampilkan ringkasan dari keseluruhan sistem, termasuk total jumlah barang, nilai
 * stok keseluruhan, jumlah kategori, dan jumlah pemasok
 */
Route::get('/inventorySummary', [ItemController::class, 'inventorySummary']);

/**
 * Menampilkan ringkasan per kategori, termasuk jumlah barang per kategori, total
 * nilai stok tiap kategori, dan rata-rata harga barang dalam kategori tersebut.
 */
Route::get('/categorySummary', [CategoryController::class, 'categorySummary']);


/**
 * Menampilkan ringkasan barang yang disuplai oleh masing-masing pemasok,
 * termasuk jumlah barang per pemasok dan total nilai barang yang disuplai. 
 */
Route::get('/supplierSummary', [SupplierController::class, 'supplierSummary']);
