<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansosModel extends Model
{
    use HasFactory;
    protected $table = 'penerima_bansos';
    protected $primaryKey = 'id_penerimabansos';
    public function alternatif() {
        return $this->belongsTo(AlternatifModel::class, 'id_alternatif', 'id_alternatif');
    }
    public function bansos() {
        return $this->belongsTo(BansosModel::class, 'id_bansos', 'id_bansos');
    }
    public function rw() {
        return $this->belongsTo(RwModel::class, 'id_admin', 'id_admin');
    }
    public function rt() {
        return $this->belongsTo(RtModel::class, 'id_petugas', 'id_petugas');
    }
}
