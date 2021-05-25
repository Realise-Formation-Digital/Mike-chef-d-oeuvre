<?php

use App\Http\Controllers\GearController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function ()  {
    return view('faq');
});


Route::get('/user', [GearController::class, 'test'])
    ->name('test');

Route::middleware(['auth'])->group(function () {
    Route::get('/gear', [GearController::class, 'index'])
        ->name('gear.index');

    Route::get('/gear/create', [GearController::class, 'create'])
        ->name('gear.create');

    Route::post('/gear/create', [GearController::class, 'store'])
        ->name('gear.store');

    Route::get('/gear/{id}/update', [GearController::class, 'update'])
        ->name('gear.update');

    Route::patch('/gear/{id}/update', [GearController::class, 'patch'])
        ->name('gear.patch');
});








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
