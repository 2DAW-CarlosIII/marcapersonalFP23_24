<?php

namespace App\Models;

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
    public function validar($user,$reconocimiento){
        if($user->esDocente()||$user->esAdmin()){
            $reconocimiento->docente_validador = $user->id;
            $reconocimiento->save();
            return true;
        }else{
            $reconocimientoOriginal=Reconocimiento::findOrFail($this->id);
            if($reconocimiento->docente_validador != $reconocimientoOriginal->docente_validador){
                return false;
            }else{
                return true;
            }
        }
    }
}
