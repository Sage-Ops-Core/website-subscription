<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscribers::class);
    }

}
