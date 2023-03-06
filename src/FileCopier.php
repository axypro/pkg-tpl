<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

use DirectoryIterator;

/**
 * no-copy-to-pkg
 */
class FileCopier extends BaseCopier
{
    public function copy(): void
    {
        if ($this->context->ignore->isMatch($this->path)) {
            return;
        }
        $content = FileLoader::loadFromFile($this->src);
        if ($content === null) {
            return;
        }
        $output = $this->context->name->tpl($content);
        file_put_contents($this->dest, $output);
        chmod($this->dest, fileperms($this->src));
        $this->context->logger->log($this->path);
    }
}
