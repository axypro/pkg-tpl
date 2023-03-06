<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
class Logger
{
    public function log(string $message): void
    {
        echo "$message\n";
    }

    public function error(string $message): void
    {
        fwrite(STDERR, "$message\n");
    }
}
