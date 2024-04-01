<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    /**
     * The attributes that are mass assignable.
     * 
     * @var string
     */
    protected $fillable = ['level_id', 'username', 'password', 'level', 'email'];
}