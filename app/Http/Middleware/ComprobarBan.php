<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ComprobarBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route()->parameter('id');
        $userId = Auth::user()->id;
        $tabla = DB::table('permisos_descargas')->where('curriculo_id', $id)->where('empresa_id', $userId)->first();
        if ($tabla->validado === false){
            abort(412, 'Precondition Failed');
        }
        return $next($request);
    }
}
