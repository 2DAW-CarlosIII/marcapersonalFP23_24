<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'color',
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_competencias');
    }
}
