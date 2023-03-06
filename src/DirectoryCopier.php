<?php

declare(strict_types=1);

namespace axy\pkg\tpl;

use DirectoryIterator;

/**
 * no-copy-to-pkg
 */
class DirectoryCopier extends BaseCopier
{
    public function copy(): void
    {
        if ($this->context->ignore->isMatch($this->path)) {
            return;
        }
        if ($this->src === $this->context->dest) {
            return; // just in case
        }
        if (!file_exists($this->dest)) {
            mkdir($this->dest, recursive: true);
        }
        $iterator = new DirectoryIterator($this->src);
        foreach ($iterator as $file) {
            if ($file->isDot()) {
                continue;
            }
            $path = $this->path;
            if ($path !== '') {
                $path = "$path/";
            }
            $path .= $file->getBasename();
            if ($file->isDir()) {
                $copier = new self($this->context, $path);
            } else {
                $copier = new FileCopier($this->context, $path);
            }
            $copier->copy();
        }
    }
}
