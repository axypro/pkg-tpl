<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
class PkgName
{
    public function __construct(public readonly string $name)
    {
        $this->search = [
            'axy/pkg-tpl',
            'axy\pkg-tpl',
            'axypro/pkg-tpl',
            'axy\pkg\tpl',
            'axy\\\pkg\\\tpl',
            'axy_pkg_tpl',
            '/pkg-tpl/',
        ];
        $this->replace = [
            "axy/$name",
            "axy\\$name",
            "axypro/$name",
            'axy\\' . str_replace('-', '\\', $name),
            'axy\\\\' . str_replace('-', '\\\\', $name),
            'axy_' . str_replace('-', '_', $name),
            "/$name/",
        ];
    }

    public function tpl(string $content): string
    {
        return str_replace($this->search, $this->replace, $content);
    }

    public static function isNameValid(string $name): bool
    {
        $pattern = '/^[a-z0-9]+(-[a-z0-9]+){0,5}$/';
        return (bool)preg_match($pattern, $name);
    }

    private array $search = [];
    private array $replace = [];
}
