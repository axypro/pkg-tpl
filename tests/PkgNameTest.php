<?php

declare(strict_types=1);

namespace axy\pkg\tpl\tests;

use axy\pkg\tpl\PkgName;

/**
 * no-copy-to-pkg
 */
class PkgNameTest extends BaseTestCase
{
    public function testPkgName(): void
    {
        $name = new PkgName('one-two');
        $this->assertSame('one-two', $name->name);
        $content = implode("\n", [
            '@package axy\pkg\tpl\tests',
            'COMPOSE_PROJECT_NAME="axy_pkg_tpl_test"',
            '"name": "axy/pkg-tpl"',
            '@link https://github.com/axypro/pkg-tpl repository',
            '"axy\\pkg\\tpl\\": "src"',
        ]);
        $expected = implode("\n", [
            '@package axy\one\two\tests',
            'COMPOSE_PROJECT_NAME="axy_one_two_test"',
            '"name": "axy/one-two"',
            '@link https://github.com/axypro/one-two repository',
            '"axy\\one\\two\\": "src"',
        ]);
        $this->assertSame($expected, $name->tpl($content));
    }

    public function testIsNameValid(): void
    {
        $this->assertTrue(PkgName::isNameValid('one'));
        $this->assertTrue(PkgName::isNameValid('one-two-three'));
        $this->assertFalse(PkgName::isNameValid('one--two-three'));
        $this->assertFalse(PkgName::isNameValid('one-Two-three'));
        $this->assertFalse(PkgName::isNameValid('one/two-three'));
    }
}
