<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Home
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home.first');
    Route::get('/parties/{id}', 'showData'); 
});


//CRUD Party

Route::get('/parties/trashed', [PartyController::class, 'trashed'])->name('parties.trashed');
Route::get('/parties/{id}/restore', [PartyController::class, 'restore'])->name('parties.restore');
Route::delete('parties/{id}/force-delete', [PartyController::class, 'forceDelete'])->name('parties.force_delete');

Route::resource('parties', PartyController::class);

