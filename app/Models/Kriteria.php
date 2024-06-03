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
        return $this->hasMany(SubKriteria::class, 'kriteria_id', 'id_kriteria');
    }

    public function alternatif()
    {
        return $this->belongsToMany(AlternatifModel::class, 'nilai', 'kriteria_id', 'alternatif_id')
                    ->withPivot('nilai')
                    ->withTimestamps();
    }
}