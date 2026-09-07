<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConvertNumbersMiddleware
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
      foreach ($request->keys() as $key){
        if ($request->hasFile($key))
          continue;
        $request->attributes->set($key, toEnglishNumbers($request->get($key)));
      }
      return $next($request);
    }
}
