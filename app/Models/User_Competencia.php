<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Competencia extends Model
{
   use HasFactory;


   protected $primaryKey = ['user_id', 'competencia_id'];
   protected $fillable = [
       'user_id',
       'competencia_id',
       'docente_validador',
   ];
}

