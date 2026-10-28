<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

class UploadedImage
{
    public static function rules(bool $icon = false): array
    {
        return [
            'nullable',
            'bail',
            function (string $attribute, mixed $value, \Closure $fail) use ($icon): void {
                if (! $value instanceof UploadedFile) {
                    return;
                }

                if (! $value->isValid()) {
                    $fail(self::uploadError($value));

                    return;
                }

                if (! self::readable($value, $icon)) {
                    $fail('Use a JPG, PNG, GIF, or WebP image.');

                    return;
                }

                if ($value->getSize() > 8 * 1024 * 1024) {
                    $fail('Use an image under 8 MB.');
                }
            },
        ];
    }

    public static function extension(UploadedFile $file): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        if (in_array($extension, ['jpeg', 'jfif'], true)) {
            return 'jpg';
        }

        if (in_array($extension, ['jpg', 'png', 'gif', 'webp', 'bmp', 'ico'], true)) {
            return $extension;
        }

        $type = @exif_imagetype($file->getPathname()) ?: (@getimagesize($file->getPathname())[2] ?? null);

        return match ($type) {
            IMAGETYPE_JPEG => 'jpg',
            IMAGETYPE_GIF => 'gif',
            IMAGETYPE_BMP => 'bmp',
            18 => 'webp',
            default => 'png',
        };
    }

    public static function move(UploadedFile $file, string $directory, string $attribute = 'cover_image'): string
    {
        if (! is_dir($directory) && ! mkdir($directory, 0755, true) && ! is_dir($directory)) {
            throw ValidationException::withMessages([
                $attribute => 'The server could not create the image folder.',
            ]);
        }

        $filename = \Illuminate\Support\Str::uuid()->toString().'.'.self::extension($file);

        try {
            $file->move($directory, $filename);
        } catch (\Throwable) {
            throw ValidationException::withMessages([
                $attribute => 'The server could not save that image. The image folder needs to be writable.',
            ]);
        }

        return $filename;
    }

    private static function readable(UploadedFile $file, bool $icon): bool
    {
        $extension = strtolower($file->getClientOriginalExtension());
        if ($icon && $extension === 'ico') {
            return true;
        }

        if (function_exists('exif_imagetype')) {
            $type = @exif_imagetype($file->getPathname());
            $allowed = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF, IMAGETYPE_BMP];
            if (defined('IMAGETYPE_WEBP')) {
                $allowed[] = IMAGETYPE_WEBP;
            }
            if (in_array($type, $allowed, true)) {
                return true;
            }
        }

        return @getimagesize($file->getPathname()) !== false;
    }

    private static function uploadError(UploadedFile $file): string
    {
        return match ($file->getError()) {
            UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'That image is larger than the server allows. Use one under 8 MB.',
            UPLOAD_ERR_PARTIAL => 'The upload was interrupted. Try that image again.',
            UPLOAD_ERR_NO_TMP_DIR, UPLOAD_ERR_CANT_WRITE => 'The server could not store the upload. Ask the host to allow file uploads.',
            default => 'The image did not upload. Try a JPG or PNG under 8 MB.',
        };
    }
}
