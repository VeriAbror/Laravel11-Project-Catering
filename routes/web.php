<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AnalyticsController2;
use App\Http\Controllers\MenuController;



// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
//     Route::get('/list', [AdminController::class, 'index'])->name('admin.list');
//     Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
//     Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
//     Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
//     Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
//     Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
// });

// Route::group(['prefix' => 'management', 'middleware' => 'auth:admin'], function () {
//     Route::get('/orders', [OrderController::class, 'index'])->name('orders.list');
//     Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
//     Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
//     Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
//     Route::post('/orders/update/{id}', [OrderController::class, 'update'])->name('orders.update');
//     Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy'])->name('orders.delete');

//     Route::get('/customers', [CustomerController::class, 'index'])->name('customers.list');
//     Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
//     Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
//     Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
//     Route::post('/customers/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
//     Route::delete('/customers/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.delete');
// });

// // Group admin-related routes with authentication middleware
// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
//     Route::resource('admin', AdminController::class);
//     Route::resource('orders', OrderController::class);
//     Route::resource('customers', CustomerController::class);
// });

// // Analytics Routes (Not inside admin/management, but still protected by auth:admin)
// Route::middleware(['auth:admin'])->group(function () {
//     // Resource routes for Admin, Orders, and Customers
//     Route::resource('admin', AdminController::class);
//     Route::resource('orders', OrderController::class);
//     Route::resource('customers', CustomerController::class);

//     // Analytics Routes
//     Route::get('/analytics/sales-chart', [AnalyticsController::class, 'salesChart'])->name('analytics.salesChart');
//     Route::get('/analytics/top-menu', [AnalyticsController::class, 'topMenu'])->name('analytics.topMenu');
// });

Route::resource('orders', OrderController::class);
Route::resource('customers', CustomerController::class);

Route::get('menu/snackbox', [MenuController::class, 'snackbox'])->name('menu.snackbox');
Route::get('menu/snack', [MenuController::class, 'snack'])->name('menu.snack');
Route::get('menu/nasibox', [MenuController::class, 'nasibox'])->name('menu.nasibox');
Route::get('menu/kue_kering', [MenuController::class, 'kue_kering'])->name('menu.kue_kering');
Route::get('menu/tumpeng', [MenuController::class, 'tumpeng'])->name('menu.tumpeng');
Route::get('omset/top-menu', [MenuController::class, 'omset'])->name('omset.top-menu');
Route::get('omset/chart', [MenuController::class, 'chart'])->name('omset.chart');

// Rute untuk menampilkan grafik omset
Route::get('omset/chart', [AnalyticsController::class, 'salesChart'])->name('omset.chart');
Route::get('omset/chartpertanggal', [AnalyticsController2::class, 'salesChart'])->name('omset.chart2');

Route::get('/home', function () {
    return view('home'); 
})->name('home');

Route::get('/analytics/sales/export', [AnalyticsController::class, 'exportSalesToExcel'])->name('analytics.sales.export');
Route::get('/analytics/sales/export', [AnalyticsController2::class, 'exportSalesToExcel'])->name('analytics.sales.export');



// Route::resource('customers', CustomerController::class)->parameters([
//     'customers' => 'id_pelanggan',  // Ganti nama parameter menjadi id_pelanggan
// ]);


// Route::get("/", function () {
//     return view("order.index");
// });
