<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'nama_kriteria',
        'tipe',
        'bobot'
    ];

    public function subkriterias()
    {
        return $this->hasMany(Subkriteria::class, 'id_kriteria');
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'id_kriteria');
    }
    public function alternatif()
    {
        return $this->belongsToMany(AlternatifModel::class, 'alternatif_kriteria', 'id_kriteria', 'id_alternatif')
                    ->withPivot('nilai');
    }
}
