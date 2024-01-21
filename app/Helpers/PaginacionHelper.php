<?php
namespace App\Helpers;

use App\Http\Resources\ActividadResource;

class PaginacionHelper
{
    public static function applyPaginacion($query, $request, $sort, $ord)
    {

        return ActividadResource::collection(
            $query->orderBy($request->_sort ?? $sort, $request->_order ?? $ord)
            ->paginate($request->perPage));
    }
}
