<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    use HasFactory;
    protected $table = 'pengajuans';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'no_kk', 
        'no_nik', 
        'nama', 
        'no_rt', 
        'pekerjaan', 
        'penghasilan', 
        'pendidikan', 
        'jumlah_tanggungan', 
        'tempat_tinggal'
    ];
}
