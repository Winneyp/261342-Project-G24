<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('products');
// });

Route::get('/', [ProductController::class, 'index'])->name('products.index');

//delete data
Route::get('/deleteclothfromdb', [ProductController::class, 'deleteClothFromDb'])->name('delete.cloth.from.db');
Route::delete('/deleteclothfromdb/{id}', [ProductController::class, 'destroy'])->name('delete.cloth.destroy');

//add data
Route::get('/addNewProduct', [ProductController::class, 'showAddProductForm'])->name('add.new.product');
Route::post('/addNewProduct', [ProductController::class, 'store'])->name('add.new.product.store');

//to product detail
Route::get('/{id}', [ProductController::class, 'show']);

//login system
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile')->middleware('auth');
