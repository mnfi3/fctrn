<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class VisitLogMiddleware
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
      try {
        $count = DB::table('visitlogs')->count();
        if ($count > 100000)
          DB::table('visitlogs')->truncate();
        VisitLog::save();
      }catch (\Exception $e){}

        return $next($request);
    }
}
