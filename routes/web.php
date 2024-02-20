<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CommonController;

use App\Http\Controllers\Nodal\DashboardController as NodalDashboardController;
use App\Http\Controllers\Nodal\ComplainantController as NodalComplaintController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ComplaintController as UserComplaintController;

use App\Http\Controllers\Fco\DashboardController as FcoDashboardController;
use App\Http\Controllers\Fco\ComplainantController as FcoComplaintController;

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

Route::middleware(['auth', 'verified', 'role:user,nodal,fco'])->group(function () {
    
    Route::get('/view-file/{file}', [CommonController::class, 'viewFile'])->name('view-file');

    Route::get('/preview/file/{file_id}', [CommonController::class, 'previewFile'])->name('preview.file');
});

// User Routes
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {

    Route::get('/user-dashboard', [UserDashboardController::class, 'index'] )->name('user.dashboard');
    Route::get('/user-complaints/list', [UserComplaintController::class, 'index'] )->name('user.complaints');
    Route::get('/user-complaints/edit', [UserComplaintController::class, 'edit'] )->name('user.complaint.edit');
    Route::get('/user-complaint/create', [UserComplaintController::class, 'create'] )->name('user.complaint.create');
    Route::post('/user-complaint/store', [UserComplaintController::class, 'store'] )->name('user.complaint.store');

    Route::get('/user-complaint/view/{complain_id}', [UserComplaintController::class, 'view'] )->name('user.complaint.view');
});


// Nodal Officer Routes
Route::middleware(['auth', 'verified', 'role:nodal'])->group(function () {
    
    Route::get('/nodal-dashboard', [NodalDashboardController::class, 'index'] )->name('nodal.dashboard');
    Route::get('/nodal-complaints/list', [NodalComplaintController::class, 'index'] )->name('nodal.complaints');
    Route::get('/nodal-complaints/edit/{list_id}', [NodalComplaintController::class, 'edit'] )->name('nodal.complaint.edit');
    Route::post('/nodal-complaints/update', [NodalComplaintController::class, 'update'] )->name('nodal.complaint.update');

    Route::get('/nodal-complaint/view/{complain_id}', [NodalComplaintController::class, 'view'] )->name('user.nodal.view');

    Route::get('/storage/app/{path}/{file}', 'CommonController@preview')->name('storage.preview');
});


// FCO Officer Routes
Route::middleware(['auth', 'verified', 'role:fco'])->group(function () {
    Route::get('/fco-dashboard', [FcoDashboardController::class, 'index'] )->name('fco.dashboard');
    Route::get('/fco-complaints/list', [FcoComplaintController::class, 'index'] )->name('fco.complaints');
    Route::get('/fco-complaints/edit/{list_id}', [FcoComplaintController::class, 'edit'] )->name('fco.complaint.edit');
    Route::get('/fco-complaints/view/{complain_id}', [FcoComplaintController::class, 'view'] )->name('fco.complaint.view');

    Route::post('/fco-complaints/update', [FcoComplaintController::class, 'update'] )->name('fco.complaint.update');
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
