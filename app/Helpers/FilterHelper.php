<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $otrosFiltros = null)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if ($filterValue) {
            foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }

        if ($otrosFiltros) {
            foreach ($otrosFiltros as $column) {
                if($request->$column){

                    $query->orWhere($column, 'like', '=' . $request->$column . '%');

                }
            }
        }

        return $query;
    }
}
