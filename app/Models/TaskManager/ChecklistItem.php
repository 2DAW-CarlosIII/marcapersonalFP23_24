<?php

namespace App\Models\TaskManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'name',
        'completed',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
