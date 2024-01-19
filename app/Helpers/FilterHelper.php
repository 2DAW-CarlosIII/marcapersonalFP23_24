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
        $totalCount = $query->count();
        return [
            'query' => $query,
            'total' => $totalCount
        ];
    }
}
