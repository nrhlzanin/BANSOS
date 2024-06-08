<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'id_warga',
        'foto_kk', 
        'foto_ktp', 
        'pekerjaan', 
        'penghasilan', 
        'foto_slipgaji',
        'pendidikan', 
        'jumlah_tanggungan', 
        'tempat_tinggal',
        'transportasi', 
        'luas_bangunan', 
        'jenis_atap', 
        'jenis_dinding', 
        'kelistrikan', 
        'sumber_air_bersih'
    ];
    protected $casts = [
        'aset' => 'array',
    ];
    public function warga() {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }
    public function alternatif() {
        return $this->hasOne(AlternatifModel::class, 'id_pengajuan', 'id_pengajuan');
    }
}
