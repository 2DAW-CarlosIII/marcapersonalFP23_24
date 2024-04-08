<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Docente extends User
{
    protected $table = 'users';
    
    public function newQuery($excludeDeleted = true): Builder
    {
        $query = parent::newQuery($excludeDeleted);

        $emailDomain = env('TEACHER_EMAIL_DOMAIN');
        $query->where('email', 'like', "%@{$emailDomain}");

        return $query;
    }
}