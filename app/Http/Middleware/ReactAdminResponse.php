<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReactAdminResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $request->merge(['perPage' => 10]);
        if($request->filled('_start')) {
            if($request->filled('_end')) {
                $request->merge(['perPage' => $request->_end - $request->_start]);
            }
            $request->merge(['page' => $request->_start / $request->perPage + 1]);
        }
        $response = $next($request);
        if($request->routeIs('*.index')) {
            abort_unless($request->attributes->has('total_count') && is_int($request->attributes->get('total_count')), 500, "No se conoce el número de registros.");
            $totalCount = $request->attributes->get('total_count');
            $response->headers->set('X-Total-Count', $totalCount);
        }
        try {
            if(is_callable([$response, 'getData'])) {
                $responseData = $response->getData();
                if(isset($responseData->data)) {
                    $response->setData($responseData->data);
                }
            }
        } catch (\Throwable $th) { }
        return $response;
    }
}
