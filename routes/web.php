<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\DemoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/article/{id}', [HomeController::class, 'article'])->name('article');

//Route for user login and logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

// Route::get('/tag', [DemoController::class, 'tag']);
// Route::get('/category', [DemoController::class, 'category']);
// Route::get('/blog', [DemoController::class, 'blog']);

//use route group and middleware of authentication
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //route categories
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    //route tags
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tag/{id}', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/tag/{id}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
    //route post
    Route::get('/post', [postController::class, 'index'])->name('post.index');
    Route::get('/post/create', [postController::class, 'create'])->name('post.create');
    Route::post('/post/store', [postController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [postController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}', [postController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [postController::class, 'destroy'])->name('post.destroy');
});





