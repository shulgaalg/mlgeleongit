<?php

use App\Http\Controllers\testController;
use App\Http\Controllers\ScrollController;
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

Route::get('/all', [App\Http\Controllers\viewAllScrollsController::class,'showAll']);

Route::get('/land', [App\Http\Controllers\viewAllScrollsController::class,'Landing'])->name('LandingPage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/s1', [testController::class,'testFoo']);

Route::resource('scroll','App\Http\Controllers\ScrollController');
Route::resource('group','App\Http\Controllers\GroupController');
Route::resource('landing','App\Http\Controllers\LandingController');


Route::get('/lift', function () {
    return view('lift');
});

Route::get('/tt', [testController::class,'tFoo']);

Route::get('/php', [testController::class,'phpInfo']);

Route::get('/', function () {
    return view('welcome');
});