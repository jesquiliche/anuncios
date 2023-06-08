<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\SubCategoriaController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [HomeController::class,'index'])->name('admin.home');
Route::get("/categorias",[CategoriaController::class,'index'])->name('admin.categoria.index');
Route::get("/categorias/create",[CategoriaController::class,'create'])->name('admin.categoria.create');
Route::post("/categorias/store",[CategoriaController::class,'store'])->name('admin.categoria.store');
Route::put("/categorias/update/{id}",[CategoriaController::class,'update'])->name('admin.categoria.update');
Route::get("/categorias/edit/{id}",[CategoriaController::class,'edit'])->name('admin.categoria.edit');
Route::delete("/categorias/delete/{id}",[CategoriaController::class,'destroy'])->name('admin.categoria.delete');

Route::get("/subcategorias",[SubCategoriaController::class,'index'])->name('admin.subcategorias.index');
Route::post("/subcategorias/store",[SubCategoriaController::class,'store'])->name('admin.subcategorias.store');
Route::get("/subcategorias/create",[SubCategoriaController::class,'create'])->name('admin.subcategorias.create');
Route::get("/subcategorias/edit/{id}",[SubCategoriaController::class,'edit'])->name('admin.subcategorias.edit');
Route::put("/subcategorias/update/{id}",[SubCategoriaController::class,'update'])->name('admin.subcategorias.update');

Route::delete("/subcategorias/delete/{id}",[SubCategoriaController::class,'destroy'])->name('admin.subcategorias.delete');

Route::resource("/users",UserController::class)->names('admin.user');

//