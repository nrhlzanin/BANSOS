<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $guarded = ["id"];

    public function jenisBantuan()
    {
        return $this->hasMany(JenisBantuan::class);
    }
}
