<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "users";
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
    public function interestedIn()
    {
        return $this->belongsTo(InterestedIn::class);
    }
    public function statusOfRelationship()
    {
        return $this->belongsTo(StatusOfRelationship::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function eyeColor()
    {
        return $this->belongsTo(EyeColor::class);
    }
    public function hairColor()
    {
        return $this->belongsTo(HairColor::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function userComments()
    {
        return $this->hasMany(UserComment::class);
    }
    public function friends()
    {
        return $this->hasMany(Friend::class);
    }
}
