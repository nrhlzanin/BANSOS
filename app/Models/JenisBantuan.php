<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
    use HasFactory;

    public function informasi()
    {
        return $this->belongsTo(Informasi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);;
    }
}
