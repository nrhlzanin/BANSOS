<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifModel extends Model
{
	use HasFactory;

	// lepaskan proteksi mass assignment
	protected $table = 'alternatif';
	protected $primaryKey = 'id_alternatif';

	public function pengajuan() {
		return $this->belongsTo(PengajuanModel::class, 'id_pengajuan', 'id_pengajuan');
	}
	public function kriteria()
	{
		return $this->belongsToMany(Kriteria::class)->withPivot('nilai');
	}
	public function penerimaBansos() {
		return $this->hasOne(PenerimaBansosModel::class, 'id_alternatif', 'id_alternatif');
	}
}