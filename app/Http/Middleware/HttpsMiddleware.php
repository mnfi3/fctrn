<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsMiddleware
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
    $len = strlen('https');
    $is_https = (substr($request->fullUrl(), 0, $len) === 'https');
//    if (env('FORCE_HTTPS', false) && $request->server('HTTP_X_FORWARDED_PROTO') != 'https') {
    if (env('FORCE_HTTPS', false) && !$is_https) {
      try {
        return redirect()->secure($request->getRequestUri());
      }catch (\Exception $e){}
    }
    return $next($request);
  }
}
