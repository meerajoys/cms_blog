<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CKEditorController;

Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware(['auth'])->group(function () {


    Route::get('/admin/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('post.store');

    Route::delete('/admin/posts/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

    // route for ck editor

    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.imageupload');
    Route::get('ckeditor/showimage', [CKEditorController::class, 'show'])->name('ckeditor.imageshow');

});







