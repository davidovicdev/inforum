<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EyeColor extends Model
{
    use HasFactory;
    protected $table = "eye_color";
    public $timestamps = false;
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
