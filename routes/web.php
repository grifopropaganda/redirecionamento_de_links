<?php

use App\Http\Controllers\LinksController;
use App\Http\Controllers\RedirectController;
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

Auth::routes();

Route::get('/link/{slug}', [RedirectController::class, 'redirect']);

Route::get('/', [LinksController::class, 'index'])->name('home');
Route::post('/criar', [LinksController::class, 'criar'])->name('criar');

Route::get('/editar/{id}', [LinksController::class, 'editarView'])->name('editarView');
Route::post('/editar', [LinksController::class, 'editar'])->name('editar');
Route::delete('/excluir/{id}', [LinksController::class, 'excluir'])->name('excluir');

Route::fallback(function () {
    return redirect('https://inteligenciaedu.com.br');
});
