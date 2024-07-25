<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
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
    return view('frontend.index');
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
Route::middleware(['auth','role:admin'])->group(function(){
    
    //admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    //Admin Login 
    
    //Admin Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    //AdminProfile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    //Admin store 
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    //Admin change password 
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    //update password
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

});
Route::middleware(['auth','role:vendor'])->group(function(){
     //Vendor Dashboard
     Route::get('vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    
     //Login 
  
     //vendor Logout
     Route::get('/vendor/logout', [VendorController::class, 'vendorDestroy'])->name('vendor.logout');
     //vendorProfile
     Route::get('/vendor/profile', [VendorController::class, 'vendorProfile'])->name('vendor.profile');
     //vendor store 
     Route::post('/vendor/profile/store', [VendorController::class, 'vendorProfileStore'])->name('vendor.profile.store');
     //vendor change password 
     Route::get('/vendor/change/password', [VendorController::class, 'vendorChangePassword'])->name('vendor.change.password');
     //update password
     Route::post('/vendor/update/password', [VendorController::class, 'vendorUpdatePassword'])->name('update.password');
});
Route::get('/vendor/login', [VendorController::class, 'vendorLogin']);
Route::get('/admin/login', [AdminController::class, 'AdminLogin']);

