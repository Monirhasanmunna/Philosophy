<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author\AuthorDashboard;
use App\Http\Controllers\Admin\AdminDashboard;




Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';



//Admin Dashborard Routes
Route::get('admin/dashboard',[AdminDashboard::class , 'index'])->middleware(['auth','admin'])->name('admin.dashboard');


//Author Dashboard Routes
Route::get('author/dashboard',[AuthorDashboard::class , 'index'])->middleware(['auth','author'])->name('author.dashboard');
