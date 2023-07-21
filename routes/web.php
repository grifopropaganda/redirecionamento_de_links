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
Route::get('/criar', [LinksController::class, 'viewCriar'])->name('criar');
Route::post('/criar', [LinksController::class, 'criar'])->name('criar');


