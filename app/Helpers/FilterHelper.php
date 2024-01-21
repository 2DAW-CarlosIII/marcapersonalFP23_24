<?php

namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $tipoBusqueda)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValues = $tipoBusqueda;

        foreach ($filterValues as $filterValue) {

            if ($filterValue) {
                foreach ($filterColumns as $column) {

                    if ($filterValue == $request->created_at ) {
                        $query->orWhereDate($column, '>=', $filterValue);
                    } else if ($filterValue == $request->hasta_at ) {

                        $query->whereDate($column, '<=', $filterValue);
                    } else if ($filterValue == $request->q ) {

                        $query->orWhere($column, 'like', '%' . $filterValue . '%');
                    } else
                    {
                        $query->orWhere($column,'like', $filterValue);
                    }
                }
            }
        }

        return $query;
    }
}
