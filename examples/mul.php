<?php
// no-copy-to-pkg

declare(strict_types=1);

namespace axy\tpl\pkg\examples;

use axy\pkg\tpl\ExampleMul;

require_once __DIR__ . '/../index.php';

for ($i = 1; $i < 10; $i++) {
    $multiplier = new ExampleMul($i);
    for ($j = 1; $j < 10; $j++) {
        echo "$i x $j = {$multiplier->mul($j)}\n";
    }
}
