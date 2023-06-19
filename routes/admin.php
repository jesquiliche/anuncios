<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\SubCategoriaController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');
Route::get("/categorias",[CategoriaController::class,'index'])->middleware('can:admin.categoria.index')->name('admin.categoria.index');
Route::get("/categorias/create",[CategoriaController::class,'create'])->middleware('can:admin.categoria.create')->name('admin.categoria.create');
Route::post("/categorias/store",[CategoriaController::class,'store'])->middleware('can:admin.categoria.store')->name('admin.categoria.store');
Route::put("/categorias/update/{id}",[CategoriaController::class,'update'])->middleware('can:admin.categoria.update')->name('admin.categoria.update');
Route::get("/categorias/edit/{id}",[CategoriaController::class,'edit'])->middleware('can:admin.categoria.edit')->name('admin.categoria.edit');
Route::delete("/categorias/delete/{id}",[CategoriaController::class,'destroy'])->middleware('can:admin.categoria.delete')->name('admin.categoria.delete');

Route::get("/subcategorias",[SubCategoriaController::class,'index'])->middleware('can:admin.subcategorias.index')->name('admin.subcategorias.index');
Route::post("/subcategorias/store",[SubCategoriaController::class,'store'])->middleware('can:admin.subcategorias.stor')->name('admin.subcategorias.store');
Route::get("/subcategorias/create",[SubCategoriaController::class,'create'])->middleware('can:admin.subcategorias.create')->name('admin.subcategorias.create');
Route::get("/subcategorias/edit/{id}",[SubCategoriaController::class,'edit'])->middleware('can:admin.subcategorias.edit')->name('admin.subcategorias.edit');
Route::put("/subcategorias/update/{id}",[SubCategoriaController::class,'update'])->middleware('can:admin.subcategorias.update')->name('admin.subcategorias.update');
Route::delete("/subcategorias/delete/{id}",[SubCategoriaController::class,'destroy'])->middleware('can:admin.subcategorias.delete')->name('admin.subcategorias.delete');

Route::resource("/users",UserController::class)->middleware('can:admin.user')->names('admin.user');


//