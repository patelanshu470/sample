<?php

use App\Http\Controllers\Backend\MainController;
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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('add', [MainController::class, 'add'])->name('add');
    Route::post('store', [MainController::class, 'store'])->name('store');
    Route::get('edit/{id}', [MainController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [MainController::class, 'update'])->name('update');
    Route::get('delete', [MainController::class, 'delete'])->name('delete');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
