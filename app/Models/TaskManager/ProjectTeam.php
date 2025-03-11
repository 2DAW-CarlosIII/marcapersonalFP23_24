<?php

namespace App\Models\TaskManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProjectTeam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'project_teams', 'user_id', 'project_id');
    }
}
