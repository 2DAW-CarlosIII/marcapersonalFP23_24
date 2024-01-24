<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_ciclo extends Model
{
    use HasFactory;
    protected $table = 'users_ciclos';
    protected $fillable = [
        'user_id',
        'ciclo_id',
    ];

    protected $primaryKey =  [
        'user_id',
        'ciclo_id',
    ];
    public $incrementing = false;
}
