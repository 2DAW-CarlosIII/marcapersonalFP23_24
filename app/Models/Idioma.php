<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = [
        'alpha2',
        'alpha3t',
        'alpha3b',
        'english_name',
        'native_name',
    ];

    /**
     * The users that belong to the idioma.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_idiomas')
        ->withPivot(['nivel', 'certificado']);
    }
}
