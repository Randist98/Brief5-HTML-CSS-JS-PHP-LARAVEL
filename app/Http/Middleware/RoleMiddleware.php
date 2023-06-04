<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
        if ($user) {
            $userRole = $user->role;
            $userRoleName = $userRole ? $userRole->name : null;

            if ($userRole && in_array($userRoleName, $roles)) {
                return $next($request);
            } else {
                abort(401, 'Unauthorized');            }
        }
        abort(401, 'Unauthorized');
    }

}
