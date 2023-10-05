<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/parties/trashed', [PartyController::class, 'trashed'])->name('parties.trashed');
Route::get('/parties/{id}/restore', [PartyController::class, 'restore'])->name('parties.restore');
Route::delete('parties/{id}/force-delete', [PartyController::class, 'forceDelete'])->name('parties.force_delete');

Route::resource('parties', PartyController::class);