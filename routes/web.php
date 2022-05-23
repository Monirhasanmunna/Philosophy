<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author\AuthorDashboard;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\adminPostController;



Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';


//Admin Dashborard Routes
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function() {

    Route::get('/dashboard',[AdminDashboard::class , 'index'])->name('admin.dashboard');
    Route::get('category/list',[CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('category/create',[CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/store',[CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/{id}/edit',[CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::delete('category/{id}/delete',[CategoryController::class, 'destroy'])->name('admin.category.destroy');
    Route::put('category/{id}/update',[CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('tag/list',[AdminTagController::class,'index'])->name('admin.tag.index');
    Route::get('tag/create',[AdminTagController::class,'create'])->name('admin.tag.create');
    Route::post('tag/add',[AdminTagController::class,'store'])->name('admin.tag.store');
    Route::get('tag/{id}/edit',[AdminTagController::class,'edit'])->name('admin.tag.edit');
    Route::put('tag/{id}/update',[AdminTagController::class,'update'])->name('admin.tag.update');
    Route::delete('tag/{id}/delete',[AdminTagController::class,'destroy'])->name('admin.tag.destroy');
    Route::get('post/list',[adminPostController::class,'index'])->name('admin.post.index');
    Route::get('post/create',[adminPostController::class,'create'])->name('admin.post.create');
    Route::post('post/store',[adminPostController::class,'store'])->name('admin.post.store');
    Route::get('post/{id}/details',[adminPostController::class,'show'])->name('admin.post.show');
    Route::get('post/{id}/edit',[adminPostController::class,'edit'])->name('admin.post.edit');
    Route::put('post/{id}/update',[adminPostController::class,'update'])->name('admin.post.update');
    Route::delete('post/{id}/delete',[adminPostController::class,'destroy'])->name('admin.post.destroy');
});



//Author Dashboard Routes
Route::get('author/dashboard',[AuthorDashboard::class , 'index'])->middleware(['auth','author'])->name('author.dashboard');
