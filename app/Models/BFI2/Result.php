<?php

namespace App\Models\BFI2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['assessment_id', 'user_id', 'type', 'trait_id', 'score', 'percentile'];
}
