<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RwModel extends Model
{
    use HasFactory;
    protected $table = 'rw';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama_admin',
        'no_telp',
    ];
    public function user() {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
