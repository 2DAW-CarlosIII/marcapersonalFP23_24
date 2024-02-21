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

    public function getStoragePathPdfCurriculum(): string
    {
        return storage_path('app/' . $this->pdf_curriculum);
    }

    /**
     * Get the md5 hash of pdf_curriculum file.
     */
    public function getMd5FileFromPdfCurriculum(): string
    {
        return md5_file($this->getStoragePathPdfCurriculum());
    }


}
