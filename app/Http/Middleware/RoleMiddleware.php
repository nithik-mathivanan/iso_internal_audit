<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      public function handle($request, Closure $next, ...$roles)
    {
         $user = Auth::user(); 
         foreach ($roles as $role) {
          if ($user->isOfType($role)) {  
                return $next($request); 
            }
        }

        abort(403, 'Sorry! You are not allowed to access this page.');
    }
}
