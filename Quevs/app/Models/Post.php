<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post',
        'file',
        'user_id',
    ];


     public function user()
    {
        // belongsTo(RelatedModel, foreign_key)
        return $this->belongsTo(User::class, 'users_id');
    }
}
