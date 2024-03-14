<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermisoDescarga extends Model
{
    use HasFactory;
    protected $table = 'permisos_descargas';
    protected $fillable = [
        'curriculo_id',
        'empresa_id',
        'validado'
    ];

    public function curriculo(): BelongsTo
    {
        return $this->belongsTo(Curriculo::class, 'curriculo_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'empresa_id');
    }

}
