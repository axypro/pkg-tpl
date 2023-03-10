<?php

declare(strict_types=1);

namespace axy\pkg\tpl\tests;

use axy\pkg\tpl\ExampleMul;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * no-copy-to-pkg
 */
class ExampleMulTest extends BaseTestCase
{
    #[DataProvider('providerMul')]
    public function testMul(int $first, int $second, int $expected): void
    {
        $this->assertSame($expected, (new ExampleMul($first))->mul($second));
    }

    public static function providerMul(): array
    {
        return [
            '2x2=4' => [2, 2, 4],
            '5x7=35' => [5, 7, 35],
        ];
    }
}
