<?php

declare(strict_types=1);

namespace axy\pkg\tpl\tests;

use axy\pkg\tpl\FileLoader;

/**
 * no-copy-to-pkg
 */
class FileLoaderTest extends BaseTestCase
{
    public function testPlain(): void
    {
        $content = implode("\n", [
            'One',
            '',
            'Two ',
            '  ',
            '  ',
            ' ',
        ]);
        $expected = implode("\n", [
            'One',
            '',
            'Two',
            '',
        ]);
        $this->assertSame($expected, FileLoader::loadFromContent($content));
    }

    public function testSplit(): void
    {
        $content = implode("\n", [
            'One',
            '',
            '',
            '# no-copy-below-to-pkg ',
            '  ',
            '  ',
            '# no-copy-below-to-pkg ',
            ' ',
        ]);
        $expected = implode("\n", [
            'One',
            '',
        ]);
        $this->assertSame($expected, FileLoader::loadFromContent($content));
    }

    public function testIgnore(): void
    {
        $content = implode("\n", [
            'One',
            '',
            '',
            '# no-copy-to-pkg ',
            '  ',
            '  ',
            '# no-copy-below-to-pkg ',
            ' ',
        ]);
        $this->assertNull(FileLoader::loadFromContent($content));
    }
}
