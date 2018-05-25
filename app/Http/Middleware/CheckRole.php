<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Route;
use App\Admin;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Current url 
        $route = Route::currentRouteName() ;

        // Get the current admin role
        $admin = Auth::guard('admin')->user()->role;

        foreach (config('role.pageRole') as $role) 
        {
            if (str_contains($route, 'settings')) 
            {
                return $next($request);
            }
            else 
            {
                if (str_contains($route, $role['route'])) 
                {
                    if ($admin[$role['role']]) 
                    {
                        return $next($request);
                    }
                }
            }
        }
        return redirect()->back();
    }
}
