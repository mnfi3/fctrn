<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrustReferer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $referrer = $request->headers->get('referer');
        if (is_string($referrer) && $this->validateDomain($referrer) === false) {
            $request->headers->remove('referer');
            $request->headers->set('referer', route('home'));
        }
        return $next($request);
    }

    protected function validateDomain(string $referrer): bool
    {
        if (empty($referrer))
            return true;
        $url = url('/');
        $referrerDomain = parse_url($referrer, PHP_URL_HOST);
        $currentDomain = parse_url($url, PHP_URL_HOST);
        return ($referrerDomain === $currentDomain) ? true : false;
    }
}
