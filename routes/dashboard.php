<?php


use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
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
//Route::middleware('auth')->as('dashboard)->prefix('dashboard')->group(function(){
//////////////////
//});
Route::group(
    ['middleware'=>['auth'],
        'prefix'=>'dashboard'
    ], function (){
    Route::get('/',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

    Route::resource('/categories',CategoriesController::class);

});


