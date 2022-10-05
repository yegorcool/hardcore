<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Role\RoleChecker;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $role
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next, $role)
    {
        /** @var User $user */
        $user = Auth::guard()->user();

        if ($user->role != $role) {
            return redirect('/');
        }

        return $next($request);
    }
}
