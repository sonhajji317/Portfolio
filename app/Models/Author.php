<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'avatar'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
