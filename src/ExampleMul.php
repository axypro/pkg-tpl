<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
class ExampleMul
{
    public function __construct(public readonly int $first)
    {
    }

    public function mul(int $second): int
    {
        return $this->first * $second;
    }
}
