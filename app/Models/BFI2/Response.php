<?php

namespace App\Models\BFI2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['assessment_id', 'question_id', 'user_id', 'value'];
}
