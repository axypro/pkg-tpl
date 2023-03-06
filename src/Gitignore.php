<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
class Gitignore
{
    public readonly array $full;
    public readonly array $short;

    public function __construct(array $lines)
    {
        $this->loadLines($lines);
    }

    public static function loadFromFile(string $filename): self
    {
        $lines = [];
        foreach (file($filename) as $line) {
            $line = trim($line);
            if (($line !== '') && (!str_starts_with($line, '#'))) {
                $lines[] = $line;
            }
        }
        return new self($lines);
    }

    public function isMatch(string $filename): bool
    {
        foreach ($this->full as $item) {
            if ($filename === $item) {
                return true;
            }
            if (str_starts_with($filename, "$item/")) {
                return true;
            }
        }
        return in_array(basename($filename), $this->short);
    }

    private function loadLines(array $lines): void
    {
        $full = ['.git'];
        $short = [];
        foreach ($lines as $line) {
            if (str_starts_with($line, '/')) {
                $full[] = trim($line, '/');
            } else {
                $short[] = $line;
            }
        }
        $this->full = $full;
        $this->short = $short;
    }
}
