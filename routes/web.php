<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\http\Controllers\PropertyController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PropertyListController;


Route::get('/welcome', function () {
    return view('index');
});
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/get-city', [HomeController::class, 'getCity'])->name('getCity');
Route::post('/guest-add-property', [HomeController::class, 'guestAddProperty'])->name('guestAddProperty');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('residential-rent', [PropertyController::class, 'showResidentialRent'])->name('showResidentialRent');
    Route::get('residential-sell', [PropertyController::class, 'showResidentialSell'])->name('showResidentialSell');   
    Route::get('commercial-rent', [PropertyController::class, 'showCommercialRent'])->name('showCommercialRent');   
    Route::get('commercial-sell', [PropertyController::class, 'showCommercialSell'])->name('showCommercialSell');   
    Route::get('total-property', [PropertyController::class, 'totalProperty'])->name('totalProperty');   
    Route::get('user/subscribe', [OrderController::class, 'subscribe'])->name('subscribe');
    Route::post('user/create-subscribe', [OrderController::class, 'createSubscribe'])->name('createSubscribe');
    Route::get('subscribe/plane-details', [OrderController::class, 'subScriptionDetails'])->name('subScriptionDetails');
    Route::post('add-to-property', [PropertyController::class, 'addCart'])->name('addCart');
    Route::get('favourite-property', [PropertyController::class, 'favouriteProperty'])->name('favouriteProperty');
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
    Route::get('property/list', [PropertyListController::class, 'propertyList'])->name('propertyList');
    Route::get('property/create', [PropertyListController::class, 'create'])->name('create');
    Route::post('property/store', [PropertyListController::class, 'store'])->name('store');
    Route::get('user/show', [AdminController::class, 'showUser'])->name('showUser');
    Route::get('user/edit/{id}', [AdminController::class, 'editUser'])->name('editUser');
    Route::post('user/update-user', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::delete('user/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
    Route::get('subscribe/oredr-list', [AdminController::class, 'orderIndex'])->name('orderIndex');
    Route::post('subscribe/approve-payment', [AdminController::class, 'approvePayment'])->name('approvePayment');
    Route::get('user/list-property/edit-property/{id}', [PropertyListController::class, 'editProperty'])->name('editProperty');
    Route::post('user/list-property/update-property', [PropertyListController::class, 'updateProperty'])->name('updateProperty');
    Route::delete('user/list-property/delete-property/{id}', [PropertyListController::class, 'deleteProperty'])->name('deleteProperty');
    Route::post('user/status-update', [AdminController::class, 'updateUserStatus'])->name('updateUserStatus');
     
    
});