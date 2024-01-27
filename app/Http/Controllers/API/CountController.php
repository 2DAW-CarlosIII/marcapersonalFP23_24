<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountController extends Controller
{
    public function count($tabla)
    {
        abort_if(!Schema::hasTable($tabla), Response::HTTP_NOT_FOUND, 'La tabla no existe.');

        $count = DB::table($tabla)->count();

        return $count;
    }
}
