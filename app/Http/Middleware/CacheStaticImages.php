<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheStaticImages
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Cek apakah ini file gambar dari folder /assets/uploadimg/
        if (str($request->path())->startsWith('assets/uploadimg/')) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            $response->headers->set('Expires', now()->addYear()->toRfc7231String());
        }

        return $response;
    }
}
