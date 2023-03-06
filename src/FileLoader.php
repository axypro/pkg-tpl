<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
class FileLoader
{
    public static function loadFromFile(string $filename): ?string
    {
        return self::loadFromContent(file_get_contents($filename));
    }

    public static function loadFromContent(string $content): ?string
    {
        if (str_contains($content, 'no-copy-to-pkg')) {
            return null;
        }
        $e = explode('no-copy-below-to-pkg', $content, 2);
        if (count($e) === 2) {
            $content = preg_replace('/[^\n]+$/', '', $e[0]);
        }
        return rtrim($content) . "\n";
    }
}
