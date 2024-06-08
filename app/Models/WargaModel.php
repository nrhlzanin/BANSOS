<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaModel extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $primaryKey = 'id_warga';
    protected $fillable = [
        'nama_kepalaKeluarga',
        'no_telp',
        'no_rt', 
        'no_kk', 
        'no_nik', 
    ];
    public function user() {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
