<?php
/**
 * no-copy-to-pkg
 */

declare(strict_types=1);

namespace axy\pkg\tpl\bin;

use axy\pkg\tpl\CopyContext;
use axy\pkg\tpl\DirectoryCopier;
use axy\pkg\tpl\Logger;
use axy\pkg\tpl\PkgName;

require_once __DIR__ . '/../index.php';

$logger = new Logger();

$args = $_SERVER['argv'];
if (count($args) !== 2) {
    $logger->error("Format: ./create.sh package-name\n");
    exit(1);
}

$name = $args[1];
if (!PkgName::isNameValid($name)) {
    $logger->error("Wrong package name\n");
    exit(2);
}

$context = CopyContext::createDefault($name, logger: $logger);
$copier = new DirectoryCopier($context, '');
$copier->copy();
