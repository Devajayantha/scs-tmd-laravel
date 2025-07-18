<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAuthMiddleware
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
        $USERNAME = env('BASIC_AUTH_USERNAME', 'admin');
        $PASSWORD = env('BASIC_AUTH_PASSWORD', 'admin');

        if ($request->getUser() !== $USERNAME || $request->getPassword() !== $PASSWORD) {
            $headers = ['WWW-Authenticate' => 'Basic realm="Protected Area"'];
            return response('Unauthorized', 401, $headers);
        }

        return $next($request);
    }
}
