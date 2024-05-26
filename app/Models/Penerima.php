<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nik', 'contact', 'address', 'members', 'bansos'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}