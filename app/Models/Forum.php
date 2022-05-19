<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $table = "forums";
    public $timestamps = false;
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function posts()
    {
        return $this->hasManyThrough(Post::class, Topic::class, "forum_id", "topic_id");
    }
}
