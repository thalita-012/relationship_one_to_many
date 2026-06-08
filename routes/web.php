<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

//category
Route::get('/category', [categoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [categoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [categoryController::class, 'store'])->name('category.store');
Route::get('/category/show/{id}', [categoryController::class, 'show'])->name('category.show');
Route::get('/category/delete/{id}', [categoryController::class, 'delete'])->name('category.delete');


//product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/save/{id}', [ProductController::class, 'save'])->name('product.save');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');





