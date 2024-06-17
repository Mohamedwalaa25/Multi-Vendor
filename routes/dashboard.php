<?php


use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::resource('dashboard/categories',CategoriesController::class);
