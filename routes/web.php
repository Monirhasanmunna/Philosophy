<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\adminUserController;
use App\Http\Controllers\Author\authorUserController;

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\adminPostController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserlistController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AdminContactUsController;

use App\Http\Controllers\Author\AuthorDashboard;
use App\Http\Controllers\Author\authorCategoryController;
use App\Http\Controllers\Author\authorTagController;
use App\Http\Controllers\Author\authorPostController;
use App\Http\Controllers\Author\AuthorContactController;
use App\Http\Controllers\Author\AuthorContactUsController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostDetailsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;

require __DIR__.'/auth.php';

//Frontend Template Route
Route::group([],function() {
    Route::get('/',[FrontendController::class,'home'])->name('home');
    Route::get('contact',[FrontendController::class,'contact'])->name('contact.index');
    Route::get('aboutus',[FrontendController::class,'about'])->name('about');
    Route::get('post/{slug}/details',[PostDetailsController::class,'index'])->name('post.details');
    Route::get('PostByCategory/{slug}/post',[PostDetailsController::class,'categoryPost'])->name('categoryPost.details');
    Route::get('PostByTag/{slug}/post',[PostDetailsController::class,'tagPost'])->name('tagpost.details');
    Route::post('subscription',[SubscriptionController::class,'store'])->name('subscription.store');
    Route::post('comments/{post}',[CommentController::class,'store'])->name('comment.store');
    Route::post('contact_us',[ContactUsController::class,'store'])->name('contactus.store');

    Route::get('search',[FrontendController::class,'search'])->name('post.search');
});

//Admin Dashborard Routes
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function() {

    Route::get('',[AdminDashboard::class , 'index'])->name('admin.dashboard');

    Route::get('user/info',[adminUserController::class,'index'])->name('admin.user.info');
    Route::put('user/info/{id}/update',[adminUserController::class,'update'])->name('admin.user.update');

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
    Route::put('post/{id}/approve',[adminPostController::class,'approve'])->name('admin.post.approve');
    Route::put('post/{id}/disapprove',[adminPostController::class,'disapprove'])->name('admin.post.disapprove');
    Route::get('post/create',[adminPostController::class,'create'])->name('admin.post.create');
    Route::post('post/store',[adminPostController::class,'store'])->name('admin.post.store');
    Route::get('post/{id}/details',[adminPostController::class,'show'])->name('admin.post.show');
    Route::get('post/{id}/edit',[adminPostController::class,'edit'])->name('admin.post.edit');
    Route::put('post/{id}/update',[adminPostController::class,'update'])->name('admin.post.update');
    Route::delete('post/{id}/delete',[adminPostController::class,'destroy'])->name('admin.post.destroy');

    Route::get('user/list',[UserlistController::class,'index'])->name('admin.user.list');
    Route::get('user/{id}/details',[UserlistController::class,'show'])->name('admin.user.show');
    Route::delete('user/{id}/delete',[UserlistController::class,'destroy'])->name('admin.user.destroy');

    Route::get('settings',[SettingsController::class, 'index'])->name('admin.settings');
    Route::put('logo/{id}/update',[SettingsController::class, 'logoUpdate'])->name('admin.settings.logo');
    Route::put('social/{id}/update',[SettingsController::class, 'socialUpdate'])->name('admin.settings.social');
    Route::put('about/{id}/update',[SettingsController::class, 'aboutUpdate'])->name('admin.settings.about');

    Route::get('contact',[ContactController::class, 'contact'])->name('admin.contact');
    Route::put('contact/{id}/update',[ContactController::class, 'update'])->name('admin.contact.update');
    Route::get('contact_us',[AdminContactUsController::class,'index'])->name('admin.contact.index');
    Route::get('contact_us/{id}/show',[AdminContactUsController::class,'show'])->name('admin.contact.show');
    Route::delete('contact_us/{id}/destroy',[AdminContactUsController::class,'destroy'])->name('admin.contact.destroy');

    
});

//Author Dashboard Routes
Route::group(['prefix'=>'author','middleware'=> ['auth','author']],function(){

    Route::get('/dashboard',[AuthorDashboard::class , 'index'])->name('author.dashboard');

    Route::get('user/info',[authorUserController::class,'index'])->name('author.user.info');
    Route::put('user/info/{id}/update',[authorUserController::class,'update'])->name('author.user.update');

    Route::get('category/list',[authorCategoryController::class, 'index'])->name('author.category.index');
    Route::get('category/create',[authorCategoryController::class, 'create'])->name('author.category.create');
    Route::post('category/store',[authorCategoryController::class, 'store'])->name('author.category.store');
    Route::get('category/{id}/edit',[authorCategoryController::class, 'edit'])->name('author.category.edit');
    Route::delete('category/{id}/delete',[authorCategoryController::class, 'destroy'])->name('author.category.destroy');
    Route::put('category/{id}/update',[authorCategoryController::class, 'update'])->name('author.category.update');

    Route::get('tag/list',[authorTagController::class,'index'])->name('author.tag.index');
    Route::get('tag/create',[authorTagController::class,'create'])->name('author.tag.create');
    Route::post('tag/add',[authorTagController::class,'store'])->name('author.tag.store');
    Route::get('tag/{id}/edit',[authorTagController::class,'edit'])->name('author.tag.edit');
    Route::put('tag/{id}/update',[authorTagController::class,'update'])->name('author.tag.update');
    Route::delete('tag/{id}/delete',[authorTagController::class,'destroy'])->name('author.tag.destroy');

    Route::get('post/list',[authorPostController::class,'index'])->name('author.post.index');
    Route::get('post/create',[authorPostController::class,'create'])->name('author.post.create');
    Route::post('post/store',[authorPostController::class,'store'])->name('author.post.store');
    Route::get('post/{id}/details',[authorPostController::class,'show'])->name('author.post.show');
    Route::get('post/{id}/edit',[authorPostController::class,'edit'])->name('author.post.edit');
    Route::put('post/{id}/update',[authorPostController::class,'update'])->name('author.post.update');
    Route::delete('post/{id}/delete',[authorPostController::class,'destroy'])->name('author.post.destroy');

    Route::get('contact',[AuthorContactController::class, 'contact'])->name('author.contact');
    Route::put('contact/{id}/update',[AuthorContactController::class, 'update'])->name('author.contact.update');
    Route::get('contact_us',[AuthorContactUsController::class,'index'])->name('author.contact.index');
    Route::get('contact_us/{id}/show',[AuthorContactUsController::class,'show'])->name('author.contact.show');
    Route::delete('contact_us/{id}/destroy',[AuthorContactUsController::class,'destroy'])->name('author.contact.destroy');

});

