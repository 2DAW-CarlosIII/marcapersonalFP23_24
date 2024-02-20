<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Mail\NuevaEmpresaRegistrada;
use Illuminate\Support\Facades\Mail;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable=[
        'nif',
        'email',
        'token',
        'nombre',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::created(function ($empresa) {
            $empresa->token = Str::random(60);

            $usuario = User::create([
                'name' => Str::slug($empresa->nif),
                'nombre' => substr($empresa->nombre, 0, 50),
                'email' => $empresa->email,
                'password' => bcrypt('token'),
            ]);

            $empresa->user()->associate($usuario);
            $empresa->save();
            Mail::to($empresa->email)->send(new NuevaEmpresaRegistrada($empresa));
        });
    }

}
