<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class category extends Model
{
    use HasFactory;
    public function posts()
    {
        //relationship one to many
        return $this->hasMany(Post::class);
    }
}
