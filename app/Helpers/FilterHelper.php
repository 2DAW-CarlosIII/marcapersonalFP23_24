<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $parameters = null)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if($filterValue){
            foreach ($filterColumns as $column) {
                $query->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }

        if(!is_null($parameters)){
            foreach ($parameters as $parameter) {
                if($request->$parameter) {
                    $query->orWhere($parameter, 'like', '%' . $request->$parameter . '%');
                }
            }
        }

        return $query;
    }
}
