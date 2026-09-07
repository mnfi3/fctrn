<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      $user = auth()->user();
      $route = \Illuminate\Support\Facades\Request::route()->getName();

      if (hasRole(Role::ADMIN)){
        return $next($request);
      }

      if(hasPermission($route, $user)) {
        return $next($request);
      }else {
        $middlewares = Route::current()->gatherMiddleware();
        if (in_array('auth:api', $middlewares))
          return responseJson(0, [], 'شما به این api دسترسی ندارید');
        return redirect(route('site.notAccess'));
      }
    }
}
