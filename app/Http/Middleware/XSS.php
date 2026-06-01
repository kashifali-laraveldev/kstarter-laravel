<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class XSS
{
    // Never sanitize these - altering passwords breaks auth, token breaks CSRF
    private const SKIP_KEYS = [
        '_token',
        'route',
        'password',
        'current_password',
        'new_password',
        'new_password_confirmation',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $sanitizable = array_diff_key($request->all(), array_flip(self::SKIP_KEYS));

        if (!empty($sanitizable)) {
            $request->merge($this->sanitizeArray($sanitizable));
        }

        $response = $next($request);

        // Security headers - added to every admin response
        return $response
            ->header('X-XSS-Protection', '1; mode=block')
            ->header('X-Content-Type-Options', 'nosniff')
            ->header('X-Frame-Options', 'SAMEORIGIN')
            ->header('Referrer-Policy', 'strict-origin-when-cross-origin');
    }

    private function sanitizeArray(array $data): array
    {
        foreach ($data as $key => $value) {
            $data[$key] = is_array($value)
                ? $this->sanitizeArray($value)
                : (is_string($value) ? $this->cleanString($value) : $value);
        }

        return $data;
    }

    private function cleanString(string $value): string
    {
        // Remove <script> blocks and their content
        $value = preg_replace('/<script\b[^>]*>[\s\S]*?<\/script>/i', '', $value);

        // Remove inline event handlers: onclick="…", onmouseover='…', etc.
        $value = preg_replace('/\s+on\w+\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]*)/i', '', $value);

        // Neutralise javascript: and vbscript: URI schemes
        $value = preg_replace('/(?:javascript|vbscript)\s*:/i', '', $value);

        // Strip all remaining HTML/XML tags
        $value = strip_tags($value);

        return $value;
    }
}
