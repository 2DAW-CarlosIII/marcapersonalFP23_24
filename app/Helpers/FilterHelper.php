<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if ($filterValue) {
            foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }
        return $query;
    }

    public static function applySorterAndOrder($query, $request)
    {
        //Le tenemos que pasar también el request para acceder a los valores mandados en la petición
        return $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc');

    }
}
