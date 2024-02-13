<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;

use App\Http\Controllers\Nodal\DashboardController as NodalDashboardController;
use App\Http\Controllers\Nodal\ComplainantController as NodalComplainantController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ComplainantController as UserComplainantController;

use App\Http\Controllers\Fco\DashboardController as FcoDashboardController;
use App\Http\Controllers\Fco\ComplainantController as FcoComplainantController;

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

// User Routes
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {

    Route::get('/user-dashboard', [UserDashboardController::class, 'index'] )->name('user.dashboard');
    Route::get('/user-complaints/list', [UserComplainantController::class, 'index'] )->name('user.complaints');
});


// Nodal Officer Routes
Route::middleware(['auth', 'verified', 'role:nodal'])->group(function () {
    
    Route::get('/nodal-dashboard', [NodalDashboardController::class, 'index'] )->name('nodal.dashboard');
    Route::get('/nodal-complaints/list', [NodalComplainantController::class, 'index'] )->name('nodal.complaints');
    Route::get('/nodal-complaints/edit', [NodalComplainantController::class, 'edit'] )->name('nodal.complaint.edit');

});


// FCO Officer Routes
Route::middleware(['auth', 'verified', 'role:fco'])->group(function () {
    Route::get('/fco-dashboard', [FcoDashboardController::class, 'index'] )->name('fco.dashboard');
    Route::get('/fco-complaints/list', [FcoComplainantController::class, 'index'] )->name('fco.complaints');
    Route::get('/fco-complaints/edit', [FcoComplainantController::class, 'edit'] )->name('fco.complaint.edit');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [FrontendController::class, 'index']);
Route::get('/user/login', [FrontendController::class, 'userLogin'])->name('user.login');
Route::get('complainant/login', [FrontendController::class, 'complainantLogin'])->name('complainant.login');

require __DIR__.'/auth.php';
