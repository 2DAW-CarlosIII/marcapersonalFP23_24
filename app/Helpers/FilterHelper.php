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

    public static function applyOrder($query, $_sort, $_order){
        return $query->orderBy($_sort ?? 'id', $_order ?? 'asc');
    }
}
