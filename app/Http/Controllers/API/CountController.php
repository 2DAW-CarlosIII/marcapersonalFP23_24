<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountController extends Controller
{
    public function count($tabla)
    {
        abort_unless(Schema::hasTable($tabla), 404, "Table not found");

        $count = DB::table($tabla)->count();
        return response()->json(['count' => $count]);
    }

    public function totales()
    {
        return response()->json(
            [
                'empresas' => Empresa::count(),
                'proyectos' => Proyecto::count(),
                'alumnos' => User::count(),
            ]
        );
    }
}
