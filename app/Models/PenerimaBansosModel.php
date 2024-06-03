<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';

    protected $fillable = [
        'id_penerimabansos',
        'id_jenisbansos',
        'id_petugas',
        'id_admin',
        'id_pengajuan',
        'tanggal_penerimaan',
        'keterangan',
    ];

    public function jenisBansos()
    {
        return $this->belongsTo(JenisBantuan::class, 'id_jenisbansos');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanModel::class, 'id_pengajuan');
    }
}
