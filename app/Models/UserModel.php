<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    /**
     * The attributes that are mass assignable.
     * 
     * @var string
     */
    protected $fillable = ['username', 'password', 'level', 'email'];
    protected $hidden = ['password'];

    public function rt() {
        return $this->hasOne(RtModel::class, 'id_user', 'id_user');
    }
}