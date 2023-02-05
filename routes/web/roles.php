<?php

use App\Http\Controllers\RoleController;


Route::get('admin/roles/', [RoleController::class, 'index'])->name('roles.index');
Route::post('admin/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('admin/roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('admin/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');

Route::put('admin/roles/{role}/attach', [RoleController::class, 'attach_permission'])->name('roles.permission.attach');
Route::put('admin/roles/{role}/detach', [RoleController::class, 'detach_permission'])->name('roles.permission.detach');
