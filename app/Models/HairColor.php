<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairColor extends Model
{
    use HasFactory;
    protected $table = "hair_color";
    public $timestamps = false;
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
