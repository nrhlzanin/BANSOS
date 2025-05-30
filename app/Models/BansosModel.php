<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BansosModel extends Model
{
    use HasFactory;

    protected $table = 'bansos';
    protected $primaryKey = 'id_bansos';
    protected $fillable = [
        'asal_bansos',
        'jenis_bansos',
        'periode',
        'keterangan',
        'status'
    ];
}
