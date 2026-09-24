<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [

        'message',
        'users_id',
    ];



    public function user()
    {
        // belongsTo(RelatedModel, foreign_key)
        return $this->belongsTo(User::class, 'users_id');
    }
}


