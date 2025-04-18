<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PropertyListController;


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
    Route::get('state/create', [AreaController::class, 'createState'])->name('createState');
    Route::post('state/status-update', [AreaController::class, 'updateStateStatus'])->name('updateStateStatus');
    
    Route::get('city/create', [AreaController::class, 'createCity'])->name('createCity');
    Route::post('city/fetch', [AreaController::class, 'fetchCity'])->name('fetchCity');
    Route::post('city/status-update', [AreaController::class, 'updateCityStatus'])->name('updateCityStatus');
    Route::post('city/store', [AreaController::class, 'storeCity'])->name('storeCity');
    
    // Route::get('district/create', [AreaController::class, 'createDistrict'])->name('createDistrict'); 
    // Route::post('district/fetch', [AreaController::class, 'fetchDistrict'])->name('fetchDistrict'); 
    // Route::post('district/store', [AreaController::class, 'storeDistrict'])->name('storeDistrict');
    // Route::post('district/status-update', [AreaController::class, 'UpdateDistrictStatus'])->name('UpdateDistrictStatus');
    

    Route::get('property/list', [PropertyListController::class, 'propertyList'])->name('propertyList');
    Route::get('property/create', [PropertyListController::class, 'create'])->name('create');
    Route::post('property/store', [PropertyListController::class, 'store'])->name('store');

});