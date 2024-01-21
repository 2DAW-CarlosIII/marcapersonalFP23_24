<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $filterRelatedColumns = null)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if ($filterValue) {
            foreach ($filterColumns as $column) {
                $query->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }

        if ($filterRelatedColumns) {
            foreach ($filterRelatedColumns as $column) {
                if($request->$column){
                    $query->orWhere($column, '=', $request->$column);
                }
            }
        }

        return $query;
    }
}
