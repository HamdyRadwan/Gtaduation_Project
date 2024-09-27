<?php

use App\Http\Controllers\dashboard\{HomeController,
    CategoryController};
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[HomeController::class,'index'])->name('dashboard-home');
// Route::resource('/dahboard/categories', CategoryController::class);
Route::redirect('/','/dashboard');
Route::prefix('dashboard')->group(function(){
    // Route::get('/',[HomeController::class,'index'])->middleware(['dashboard','auth']) ->name('dashboard-home');
    Route::get('/',[HomeController::class,'index'])->name('dashboard-home');
    Route::resource('/categories', CategoryController::class)->except('show');
    Route::get('/categories/{id}/{name?}',[CategoryController::class,'show'])->name('categories.show');

});
Route::delete('/categories/delete', [CategoryController::class,'destroyAll'])->name('categories.destroyAll');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group([ 'middleware' => ['auth', 'dashboard'] ], function(){ Route::prefix('dashboard')->group(function(){ Route::get('/', [HomeController::class, 'index'])->name('dashboard-home'); Route::resource('/categories', CategoryController::class)->except(['show']); Route::get('/categories/{name}', [CategoryController::class, 'show'])->name('categories.show'); }); });
