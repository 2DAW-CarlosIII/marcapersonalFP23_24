<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Estudiante extends User
{
    protected $table = 'users';
    
    public function newQuery($excludeDeleted = true): Builder
    {
        $query = parent::newQuery($excludeDeleted);

        $emailDomain = env('STUDENT_EMAIL_DOMAIN');
        $query->where('email', 'like', "%@{$emailDomain}");

        return $query;
    }
}