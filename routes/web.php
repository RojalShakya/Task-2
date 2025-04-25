<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArrayController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'home'])->name('frontend-home');
// Route::get('/',[ArrayController::class,'checkEmail']);
Route::get('/mail/{id}',[MailController::class,'sendEmail'])->name('mail');

Route::get('/shop',[HomeController::class,'shop'])->name('frontend-shop');
Route::get('/shop/product/{ids}',[HomeController::class,'product'])->name('frontend-product');
Route::post('/shop/product/review',[HomeController::class,'productReview'])->name('review');

Route::group(['middleware'=>['check.status']],function(){

    Route::get('/admin',[AdminController::class,'index'])->name('dashboard');
    Route::get('/user-dashboard',[AdminController::class,'userindex'])->name('user-dashboard');
    Route::post('/update-status',[AdminController::class,'updateStatus'])->name('update-status');
    Route::post('/update-role/{user}',[AdminController::class,'assignRole'])->name('update-role');
    Route::get('/verified',[AdminController::class,'userindex'])->name('verified');
    Route::get('/permission',[AdminController::class,'showPermission'])->name('permission');
});
// Route::get('/create/permission',[PermissionController::class,'create'])->name('create-permission');
Route::resource('permission',PermissionController::class);
Route::get('/verification',[AdminController::class,'verification'])->name('verification');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function(){

        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('category')->group(function(){

        Route::get('/',[CategoryController::class,'index'])->name('view-category');
        Route::get('/create',[CategoryController::class,'create'])->name('create-category');
        Route::post('/create',[CategoryController::class,'store'])->name('create-category');
        Route::get('/destroy/{ids}',[CategoryController::class,'destroy'])->name('category.destroy');
    });


    Route::get('/create-product',[ProductController::class,'index'])->name('create-product');
    Route::post('/create-product',[ProductController::class,'store'])->name('create-product');
    Route::get('/product',[ProductController::class,'view'])->name('product-list');
    Route::get('/edit-product/{ids}',[ProductController::class,'edit'])->name('edit-product');
    Route::post('/edit-product/{ids}',[ProductController::class,'update'])->name('edit-product');
    Route::get('/delete-product/{ids}',[ProductController::class,'destroy'])->name('destroy-product');
});


Route::get('/large',[ArrayController::class,'secondLargest']);
Route::get('/large',[ArrayController::class,'checkValue']);
require __DIR__.'/auth.php';
