<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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


Route::get('/', [FrontendController::class, 'index']);
Route::get('/user/login', [FrontendController::class, 'userLogin'])->name('user.login');



Route::get('complainant/login', [FrontendController::class, 'complainantLogin'])->name('complainant.login');


Route::get('/dashboard', function () {
    return view('nodal.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/complaints/list', function () {
    return view('nodal.list');
})->middleware(['auth', 'verified'])->name('nodal.complaints');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
