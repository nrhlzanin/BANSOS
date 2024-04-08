<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansosModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'no_hp',
        // Tambahkan atribut lain sesuai kebutuhan (misal: kategori_bansos, status)
    ];
}
