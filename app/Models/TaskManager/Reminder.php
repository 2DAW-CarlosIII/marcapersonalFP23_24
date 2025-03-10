<?php

namespace App\Models\TaskManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
