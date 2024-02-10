<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'docente_id',
        'dominio',
        'metadatos',
        'calificacion',
        'fichero',
        'url_github',
    ];

    public static function mejoresProyectos($nProyectos)
    {
        $nProyectos = self::orderByDesc('calificacion')->take(5)->get();
        return $nProyectos;
    }
    public static function contarProyectos()
    {
        $proyectos = self::all()->count();
        return $proyectos;
    }

    public function getGithubSettings()
    {
        // TODO obtener un nombre según curso, familia, ciclo, nombre
        return [
            'org' => env('GITHUB_OWNER'),
            'name' => $this->nombre,
            'description' => $this->metadatos,
            'homepage' => $this->url_github,
            'private' => false,
            'has_issues' => true,
            'has_projects' => false,
            'has_wiki' => false,
        ];
    }

    public function getRepoNameFromURL()
    {
        $url = $this->url_github;
        $repoName = substr($url, strripos($url, '/') + 1);
        return $repoName;
    }

    public function urlPerteneceOrganizacion()
    {
        return strpos($this->url_github, env('GITHUB_OWNER')) > 0;
    }

    public function ciclos(): BelongsToMany
    {
        return $this->belongsToMany(Ciclo::class, 'proyectos_ciclos');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'participantes_proyectos', 'proyecto_id', 'estudiante_id');
    }

    public function docente()
    {
        return $this->belongsTo(User::class, 'docente_id');
    }
}
