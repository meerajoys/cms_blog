<?php

namespace App\Models;

use App\Models\Post;
use App\Models\CommentReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [

        'post_id',
        'is_active',
        'author',
        'email',
        'body'

    ];

    protected $primaryKey = 'post_id';

    public function replies(){

        return $this->hasMany(CommentReply::class);
    }

    public function post(){

        return $this->belongsTo(Post::class);
    }
}
