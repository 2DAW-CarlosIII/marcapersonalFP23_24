<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $relatedFilters = null)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if ($filterValue) {
            foreach ($filterColumns as $column) {
                $query->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }

        if ($relatedFilters) {
            foreach ($relatedFilters as $relatedFilter) {
                if($request[$relatedFilter]) {
                    $query->orWhere($relatedFilter, 'like', '%' . $request[$relatedFilter] . '%');
                }
            }
        }

        return $query;
    }
}
