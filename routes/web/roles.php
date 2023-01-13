<?php

use App\Http\Controllers\RoleController;


Route::get('admin/roles/', [RoleController::class, 'index'])->name('roles.index');
Route::post('admin/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::delete('admin/roles/{role}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('admin/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
