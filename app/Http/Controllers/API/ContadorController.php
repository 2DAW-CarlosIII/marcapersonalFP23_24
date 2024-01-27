<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContadorController extends Controller
{
    public function count($tabla)
    {
        if (!Schema::hasTable($tabla)) {
            abort(404, "La tabla $tabla no existe");
        }

        $count = DB::table($tabla)->count();

        return response()->json(['count' => $count]);
    }
}

