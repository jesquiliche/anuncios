<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\HomeController;
use App\http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/*Route::get('/', function () {
    return view('home');
});*/

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/


//Route::get('anuncios/{id}', 'AnuncioController@show')->name('anuncios.show');
Route::get('anuncio/{id}', [AnuncioController::class,'edit'])->name('anuncios.edit');
Route::put('anuncio/{id}', [AnuncioController::class,'update'])->name('anuncios.update');
Route::post('anuncios/store', [AnuncioController::class,'store'])->name('anuncios.store');
Route::get('anuncios/categoria/{id}', [AnuncioController::class,'showByCategory'])->name('anuncios.categoria');
Route::get('anuncios/', [AnuncioController::class,'index'])->name('anuncios.index');
Route::get('anuncios/{id}', [AnuncioController::class,'show'])->name('anuncios.show');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/anunciosFilter', [HomeController::class,'anunciosFilter'])->name('home.filter');
Route::post('/anunciosFilterMultiple', [HomeController::class,'anunciosFilterMultiple'])->name('home.filterMultiple');
Route::get('/create', [AnuncioController::class,'create'])->middleware('auth')->name('anuncios.create');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('registro');
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login2');

Route::post('/fotos', [FotoController::class, 'store'])->name('fotos.store');
Route::delete('foto/{id}', [FotoController::class, 'destroy'])->name('fotos.destroy');




