<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividades';

    protected $fillable = [
        'docente_id',
        'nombre',
        'insignia',
    ];

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'docente_id');
    }

}
