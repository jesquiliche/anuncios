<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\Admin\HomeController;
use App\http\Controllers\Admin\CategoriaController;
use App\http\Controllers\Admin\SubCategoriaController;

Route::get('/', [HomeController::class,'index'])->name('admin.home');
Route::get("/categorias",[CategoriaController::class,'index'])->name('admin.categoria.index');
Route::get("/subcategorias",[SubCategoriaController::class,'index'])->name('admin.subcategorias.index');


//