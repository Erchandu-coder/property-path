<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreaController;


Route::get('/welcome', function () {
    return view('index');
});
Route::get('/', [HomeController::class, 'home'])->name('home');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('state/create', [AreaController::class, 'createStates'])->name('createStates');

    // Route::post('state/store', [AreaController::class, 'storStates'])->name('storStates');
    Route::post('state/status-update', [AreaController::class, 'updateStatus'])->name('updateStatus');
    Route::get('cities/create', [AreaController::class, 'createcities'])->name('createcities');
    Route::post('cities/store', [AreaController::class, 'storeCities'])->name('storeCities');
    Route::post('state/city-status-update', [AreaController::class, 'cityUpdateStatus'])->name('cityUpdateStatus');

    
    Route::get('district/create', [AreaController::class, 'createdistrict'])->name('createdistrict');


});