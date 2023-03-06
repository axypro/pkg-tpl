<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

use DirectoryIterator;

/**
 * no-copy-to-pkg
 */
abstract class BaseCopier
{
    public readonly string $src;
    public readonly string $dest;

    public function __construct(public readonly CopyContext $context, public readonly string $path)
    {
        $p = $path;
        if ($p !== '') {
            $p = "/$p";
        }
        $this->src = $context->src . $p;
        $this->dest = $context->dest . $p;
    }

    abstract public function copy(): void;
}
