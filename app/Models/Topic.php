<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = "topics";
    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
