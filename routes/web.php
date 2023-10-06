<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//checklogin
Route::group(['middleware' => 'auth'], function () {
    //Home
    Route::get('/home', [HomeController::class, 'index'])->name('home.first');
    Route::get('/parties/{id}', [HomeController::class, 'showData']); 

    Route::get('/parties', [PartyController::class, 'index'])->name('parties.index');
    Route::get('/parties-create', [PartyController::class, 'create']);
    Route::post('/parties', [PartyController::class, 'store'])->name('parties.store');
    Route::get('/parties/{id}', [PartyController::class, 'show'])->name('parties.show');
    Route::get('/parties/{id}/edit', [PartyController::class, 'edit'])->name('parties.edit');
    Route::put('/parties/{id}', [PartyController::class, 'update'])->name('parties.update');
    Route::delete('/parties/{id}', [PartyController::class, 'destroy'])->name('parties.destroy');

    // Additional actions
    Route::get('/parties-trashed', [PartyController::class, 'trashed'])->name('parties.trashed');
    Route::get('/parties/{id}/restore', [PartyController::class, 'restore'])->name('parties.restore');
    Route::delete('/parties/{id}/force-delete', [PartyController::class, 'forceDelete'])->name('parties.force_delete');
});


