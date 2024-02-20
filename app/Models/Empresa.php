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
        'token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::created(function ($empresa) {
            $empresa->token = Str::random(60);

            $empresa->user()->create([
                'name' => Str::slug($empresa->nombre),
                'nombre' => $empresa->nombre,
                'email' => $empresa->email,
                'password' => bcrypt('token'),
            ]);

            $empresa->save();
            Mail::to($empresa->email)->send(new NuevaEmpresaRegistrada($empresa));
        });
    }

}
