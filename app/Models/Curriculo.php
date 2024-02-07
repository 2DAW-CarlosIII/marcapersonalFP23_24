<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_curriculum',
        'sobre_mi',
        'pdf_curriculum',
    ];

    /**
     * Get the user that owns the curriculo.
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
