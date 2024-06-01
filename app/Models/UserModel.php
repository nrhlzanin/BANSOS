<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = ['username', 'password', 'level', 'email'];
    protected $hidden = ['password'];

    public function rt()
    {
        return $this->hasOne(RtModel::class, 'id_user', 'id_user');
    }

    public function warga()
    {
        return $this->hasOne(WargaModel::class, 'id_user', 'id_user');
    }
}
