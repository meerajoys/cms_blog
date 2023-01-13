<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware(['auth'])->group(function () {


    Route::get('/admin/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('post.store');

    Route::delete('/admin/posts/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

});







