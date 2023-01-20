<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentReply extends Model
{
    use HasFactory;

    protected $fillable = [

        'comment_id',
        'is_active',
        'author',
        'email',
        'body'

    ];

    public function comment(){

        return $this->belongsTo(Comment::class);
    }
}
