<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{

    protected $fillable = [
        'user_id',
        'content',
        'content2',
        'content3',
    ];

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
