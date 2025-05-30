<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Handle OPTIONS requests
        if ($request->getMethod() === 'OPTIONS') {
            return response('', 204)
                ->withHeaders([
                    'Access-Control-Allow-Origin' => $request->headers->get('Origin') ?? '*',
                    'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS',
                    'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
                    'Access-Control-Allow-Credentials' => 'true',
                ]);
        }

        $response = $next($request);

        // Set headers using headers->set() to avoid BinaryFileResponse errors
        $response->headers->set('Access-Control-Allow-Origin', $request->headers->get('Origin') ?? '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        $response->headers->set('Access-Control-Allow-Credentials', 'true');

        return $response;
    }

}
