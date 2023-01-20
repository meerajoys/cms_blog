<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [

        'user_id',
        'title',
        'post_image',
        'body'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function setPostImageAttribute($value){

    //     $this->attributes['post_image']->asset($value);
    // }

    // public function getPostImageAttrribute($value){

        // if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE){
        //     return $value;
        // }
        // return asset('storage/' . $value);

    //     return asset($value);
    // }

    public function comments(){

        return $this->hasMany(Post::class);
    }
}
