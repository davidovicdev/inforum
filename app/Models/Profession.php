<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;
    protected $table = "professions";
    public $timestamps = false;
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
