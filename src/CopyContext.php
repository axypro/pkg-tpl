<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

/**
 * no-copy-to-pkg
 */
readonly class CopyContext
{
    public function __construct(
        public PkgName $name,
        public string $src,
        public string $dest,
        public Gitignore $ignore,
        public Logger $logger,
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
