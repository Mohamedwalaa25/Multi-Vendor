<?php


use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
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
    Route::get('/categories/trash',[CategoriesController::class,'trash'])->name('categories.trash');
    Route::put('/categories/{category}/restore',[CategoriesController::class,'restore'])->name('categories.restore');
    Route::delete('/categories/{category}/force-delete',[CategoriesController::class,'forceDelete'])->name('categories.force-delete');

    Route::resource('/categories',CategoriesController::class);
    Route::resource('/products',ProductController::class);


});


