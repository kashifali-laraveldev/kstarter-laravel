<?php

namespace App\Components;

use Exception;

class UploadAttachmentComponent
{
    public static function uploadAttachment(
        $request,
        $field,
        $directory,
        $allowedFileExtensions
    ) {
        if (!$request->hasFile($field)) {
            return null;
        }

        if ($errorMessage = self::NoExecutableFilesValidate($request->file($field))) {
            throw new Exception($errorMessage);
        }

        $file = $request->file($field);

        $extension = strtolower($file->getClientOriginalExtension());

        $filename = time() . '_' . sanitizeFileNameHelper(
            $file->getClientOriginalName()
        );

        // Validate extension
        if (!in_array($extension, $allowedFileExtensions)) {
            $fieldLabel = str_replace('_', ' ', $field);

            throw new Exception(
                'Please select a valid ' . $fieldLabel . ' file.'
            );
        }

        // Store file
        $path = $file->storeAs($directory, $filename, 'public');

        return $path;
    }

    public static function uploadAttachmentFile(
        $file,
        $directory,
        $allowedFileExtensions
    ) {
        $extension = strtolower($file->getClientOriginalExtension());

        $filename = time() . '_' . sanitizeFileNameHelper(
            $file->getClientOriginalName()
        );

        // Validate extension
        if (!in_array($extension, $allowedFileExtensions)) {
            throw new Exception('Please select a valid file.');
        }

        // Store file
        $path = $file->storeAs($directory, $filename, 'public');

        return $path;
    }

    public static function NoExecutableFilesValidate($file)
    {
        $dangerousMimes = [
            'application/x-php',
            'text/x-php',
            'text/html',
            'application/javascript',
            'application/x-executable',
        ];

        if (in_array($file->getMimeType(), $dangerousMimes)) {
            return 'Executable or script files are not allowed.';
        }

        return null;
    }
}
