<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $guarded = [];

    // Relationship to many sub-criteria
    public function subKriteria()
    {
        return $this->hasMany(SubKriteria::class, 'id_kriteria');
    } 

    public function alternatif()
    {
        return $this->belongsToMany(AlternatifModel::class, 'alternatif_kriteria', 'id_kriteria', 'id_alternatif')
                    ->withPivot('nilai');
    }
}
