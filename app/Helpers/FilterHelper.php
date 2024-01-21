<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $filterResources=null)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if ($filterValue) {
            foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }

        if ($filterResources) {
            foreach ($filterResources as $filterResource) {
                if (isset($request[$filterResource])) {
                    if(is_numeric($request[$filterResource])){
                        $query->orWhere($filterResource, '=', $request[$filterResource] . '%');
                    }else{
                        $query->orWhere($filterResource, 'like', '%' . $request[$filterResource] . '%');
                    }
                }
            }
        }

        return $query;
    }
}
