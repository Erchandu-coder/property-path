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
    Route::get('states', [AreaController::class, 'states'])->name('states');
    Route::get('cities', [AreaController::class, 'cities'])->name('cities');
    Route::get('district', [AreaController::class, 'district'])->name('district');


});