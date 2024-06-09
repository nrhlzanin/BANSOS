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
        'id_alternatif',
        'id_bansos',
        'tanggal_penerimaan',
        'keterangan',
    ];

    public function jenisBansos()
    {
        return $this->belongsTo(BansosModel::class, 'id_bansos');
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

    public function alternatif()
    {
        return $this->belongsTo(AlternatifModel::class, 'id_alternatif');
    }

    public function bansos()
    {
        return $this->belongsTo(BansosModel::class, 'id_bansos');
    }
    public function warga()
    {
        return $this->belongsTo(BansosModel::class, 'id_bansos');
    }

}
