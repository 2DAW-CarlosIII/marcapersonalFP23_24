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
                if (is_numeric($filterValue)) {
                    $query->orWhere($column, $filterValue);
                } else {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
                }
            }
        }

        if ($relatedFilters) {
            foreach ($relatedFilters as $relatedFilter) {
                if($request[$relatedFilter]) {
                    if (is_numeric($request[$relatedFilter])) {
                        $query->orWhere($relatedFilter, $request[$relatedFilter]);
                    } else {
                        $query->orWhere($relatedFilter, 'like', '%' . $request[$relatedFilter] . '%');
                    }
                }
            }
        }

        return $query;
    }
}
