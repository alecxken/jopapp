<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
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
        $response = $next($request);

        // Generate nonce for inline scripts
        $nonce = base64_encode(random_bytes(16));
        $request->attributes->set('csp_nonce', $nonce);

        // Build CSP header
        $csp = $this->buildCspHeader($nonce);

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }

    /**
     * Build the CSP header
     */
    private function buildCspHeader($nonce)
    {
        $policies = [
            // Default source
            "default-src 'self' http: https: data: blob:",

            // Scripts - allow self, inline, eval (for DataTables), and CDNs
            "script-src 'self' 'unsafe-inline' 'unsafe-eval' 'nonce-{$nonce}' https://code.jquery.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://code.highcharts.com https://maxcdn.bootstrapcdn.com",

            // Styles - allow inline styles
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://maxcdn.bootstrapcdn.com https://cdnjs.cloudflare.com",

            // Images - allow from anywhere (adjust as needed)
            "img-src 'self' data: https: http:",

            // Fonts
            "font-src 'self' data: https://fonts.gstatic.com https://maxcdn.bootstrapcdn.com",

            // Connect (AJAX/API calls)
            "connect-src 'self' https:",

            // Objects (Flash, etc)
            "object-src 'none'",

            // Base URI
            "base-uri 'self'",

            // Form actions
            "form-action 'self'",

            // Frame ancestors (prevent clickjacking)
            "frame-ancestors 'self'",
        ];

        return implode('; ', $policies);
    }
}
