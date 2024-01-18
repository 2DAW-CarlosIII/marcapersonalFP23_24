<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($query, $filterValue, $filterColumns)
    {
        if ($filterValue) {
            $query->where(function ($query) use ($filterValue, $filterColumns) {
                foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
                }
            });
        }
    }
}
