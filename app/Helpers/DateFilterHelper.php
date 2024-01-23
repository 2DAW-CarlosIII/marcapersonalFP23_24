<?php
namespace App\Helpers;

class DateFilterHelper
{
    public static function applyFilter($query, $request, $filterColumn, $date_filters)
    {
        /* Filtros de fecha*/
        if ($date_filters != null) {

            foreach ($date_filters as $filter) {
                if ($request[$filter] && $filter == 'created_at') {
                    $query->whereDate($filterColumn, '>=', $request[$filter]); /*Fecha de alta desde*/
                }
                if ($request[$filter] && $filter == 'hasta_at') {
                    $query->whereDate($filterColumn, '<=', $request[$filter]); /*Fecha de alta hasta*/
                }
            }
            return $query;
        }
    }
}
