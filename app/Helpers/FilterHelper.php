<?php
namespace App\Helpers;

use SebastianBergmann\Type\NullType;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns, $heads=null)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filterValue = $request->q;
        if ($filterValue) {
            foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%')->orWhere($column, 'like', '%' . $filterValue . '%');
            }
        }

        if ($heads) {
            foreach ($heads as $head) {
                if($request[$head]){
                    $query->orWhere($head, 'like', '%' . $request[$head] . '%');
                }
            }
        }

        return $query;
    }
}
