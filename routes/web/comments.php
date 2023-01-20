<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\CommentRepliesController;

Route::resource('admin/comments', PostCommentsController::class);
// Route::resource('admin/comment/replies', CommentRepliesController::class);
