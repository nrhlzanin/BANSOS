<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nik', 'telepon', 'alamat', 'jenis_bansos'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}