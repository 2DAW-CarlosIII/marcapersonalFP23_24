<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\BFI2\Domain;

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

    public function featuredDomains()
    {
        return $this->belongsToMany(Domain::class, 'results', 'user_id', 'trait_id')
            ->withPivot('score')
            ->where('score', ">=", env('FEATURED_DOMAIN', 4.5));
    }
}