<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class RolesMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = $request->user();

            // Comprueba si el usuario tiene el role_id de 1 o 3
            if ($user && in_array($user->role_id, [1, 3])) {
                return $next($request);
            }

            // Si el usuario no tiene el role_id requerido, devuelve una respuesta de no autorizado
            return response()->json(['error' => 'No tienes permiso para acceder a esta ruta.'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
