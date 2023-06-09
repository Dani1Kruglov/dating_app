<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(Tag::class, 'users_tags','tag_id', 'user_id');
    }
}
