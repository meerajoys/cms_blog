<?php

use App\Http\Controllers\PermissionController;


Route::get('admin/permissions', [PermissionController::class, 'index'])->name('permissions.index');
