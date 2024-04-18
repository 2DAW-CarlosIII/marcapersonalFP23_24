<?php

namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $others_filters = array())
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        if ($request->has('id')) {
            $ids = $request->id;
            $query->whereIn('id', is_array($ids) ? $ids : array($ids));
        } else {
            $filterValue = $request->q;
            /* Barra de búsqueda*/
            if ($filterValue) {
                $query->where(function ($query) use ($filterColumns, $filterValue) {
                    foreach ($filterColumns as $column) {
                        $query->orWhere($column, 'like', '%' . $filterValue . '%');
                    }
                });
            }

            /* Resto de filtros (desplegables)*/
            if ($others_filters != null) {
                foreach ($others_filters as $filter) {
                    if ($request[$filter]) {
                        $query->where($filter, $request[$filter]);
                    }
                }
            }
        }

        return $query;
    }

    public static function applyOrder($query, $request){
        return $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc');
    }
}
