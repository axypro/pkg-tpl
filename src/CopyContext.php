<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
class CopyContext
{
    public function __construct(
        public readonly PkgName $name,
        public readonly string $src,
        public readonly string $dest,
        public readonly Gitignore $ignore,
        public readonly Logger $logger,
    ) {
    }

    public static function createDefault(string $name, string $root = '/app', ?Logger $logger = null): self
    {
        return new self(
            name: new PkgName($name),
            src: $root,
            dest: "$root/local/$name",
            ignore: Gitignore::loadFromFile("$root/.gitignore"),
            logger: $logger ?? new Logger(),
        );
    }
}
