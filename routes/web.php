<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AssetsController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/assets','App\Http\Controllers\AssetsController');
    Route::resource('/elec-reading','App\Http\Controllers\ElectricityController');
    Route::resource('/bill','App\Http\Controllers\BillController');
});
require __DIR__.'/auth.php';
