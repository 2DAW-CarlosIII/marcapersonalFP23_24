<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountController extends Controller
{
    public function count($tabla)
    {
        if (!Schema::hasTable($tabla)) {
            return response()->json(['error' => 'Tabla no encontrada'], 404);
        }

        $count = DB::table($tabla)->count();
        return response()->json(['count' => $count]);
    }
}
