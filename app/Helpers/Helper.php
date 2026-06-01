<?php

use App\Components\HasPermissionsComponent;
use Illuminate\Support\Facades\Auth;

if (!function_exists('encodeId')) {
    function encodeId(int $id): string
    {
        return rtrim(strtr(base64_encode((string) $id), '+/', '-_'), '=');
    }
}

if (!function_exists('decodeId')) {
    function decodeId(string $encoded): int
    {
        $padded = strtr($encoded, '-_', '+/');
        $pad    = strlen($padded) % 4;
        if ($pad) $padded .= str_repeat('=', 4 - $pad);
        return (int) base64_decode($padded);
    }
}

if (!function_exists('sanitizeFileNameHelper')) {
    function sanitizeFileNameHelper(string $fileName)
    {
        return preg_replace(
            '/[^a-zA-Z0-9_.]/',
            '_',
            $fileName
        );
    }
}

if (!function_exists('deleteAttachmentFile')) {
    function deleteAttachmentFile(string $path)
    {
        if (!(isset($path) && !empty($path))) {
            return null;
        }

        $fullPath = public_path('storage/' . $path);

        if (file_exists($fullPath)) {
            return unlink($fullPath);
        }
    }
}

if (!function_exists('sanitizeInput')) {
    function sanitizeInput(string $value, string $type = 'string')
    {
        $value = strip_tags($value);

        switch ($type) {
            case 'int':
                return intval($value);

            case 'float':
                return floatval($value);

            case 'bool':
                return filter_var($value, FILTER_VALIDATE_BOOLEAN);

            case 'alphanumeric':
                return preg_replace('/[^a-zA-Z0-9_. ]/', '', $value);

            case 'string':
            default:
                $value = addslashes($value);

                return htmlspecialchars(
                    $value,
                    ENT_QUOTES,
                    'UTF-8'
                );
        }
    }
}

if (!function_exists('validatePermissions')) {
    function validatePermissions(string $slug)
    {
        $comp = new HasPermissionsComponent();
        return $comp->getModulesPremissionsBySlug($slug);
    }
}

if (!function_exists('getAuthUser')) {
    function getAuthUser()
    {
        return Auth::guard('admin')->user();
    }
}
