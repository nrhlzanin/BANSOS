<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RtModel extends Model
{
    use HasFactory;
    
    protected $table = 'rt';
    protected $primaryKey = 'id_petugas';
    protected $fillable = [
        'nama_petugas',
        'no_telp',
        'no_rt', 
    ];
    public function user() {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
