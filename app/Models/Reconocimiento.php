<?php

namespace App\Models;

use App\Http\Controllers\DocenteController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reconocimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudiante_id',
        'actividad_id',
        'documento',
        'docente_validador',
        'fecha'
    ];

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function validar_reconocimiento($userId){

        auth()->user()->esDocente() && auth()->user()->esAdmin() ?
        $this-> docente_validador = $userId : null;

        $this->save();
    }
}
