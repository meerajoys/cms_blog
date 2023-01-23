<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::any('admin/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
// Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('user.profile.edit');
Route::delete('admin/users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

Route::middleware(['role:admin', 'auth'])->group(function(){

    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::put('admin/users/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
    Route::put('admin/users/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');


});

Route::middleware(['auth', 'can:view,user'])->group(function(){

    Route::get('admin/users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');

});

