<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';

    protected $fillable = [
        'id_pengajuan',
        'id_kriteria',
        'id_subkriteria'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanModel::class, 'id_pengajuan');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class, 'id_subkriteria');
    }
}
