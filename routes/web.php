<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['check.status']],function(){

    Route::get('/admin',[AdminController::class,'index'])->name('dashboard');
    Route::get('/user-dashboard',[AdminController::class,'userindex'])->name('user-dashboard');
    Route::post('/update-status',[AdminController::class,'updateStatus'])->name('update-status');
});
Route::get('/verification',[AdminController::class,'verification'])->name('verification');
// Route::post('updatestatus',);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function(){

    Route::get('/create-category',[CategoryController::class,'create'])->name('create-category');
    Route::post('/create-category',[CategoryController::class,'store'])->name('create-category');
    Route::get('/view-category',[CategoryController::class,'index'])->name('view-category');
    Route::get('/destroy-category/{ids}',[CategoryController::class,'destroy'])->name('category.destroy');
});




require __DIR__.'/auth.php';
