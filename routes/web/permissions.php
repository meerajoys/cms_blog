<?php

use App\Http\Controllers\PermissionController;


Route::get('admin/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::post('admin/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('admin/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('admin/permissions/{permission}/update', [PermissionController::class, 'update'])->name('permissions.update');

Route::delete('admin/permissions/{permission}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');

