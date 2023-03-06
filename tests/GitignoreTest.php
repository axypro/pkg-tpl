<?php

declare(strict_types=1);

namespace axy\pkg\tpl\tests;

use axy\pkg\tpl\Gitignore;

/**
 * no-copy-to-pkg
 */
class GitignoreTest extends BaseTestCase
{
    public function testGitignore(): void
    {
        $gitignore = Gitignore::loadFromFile(__DIR__ . '/gitignore-test.txt');
        $this->assertSame([
            '.git',
            '.hidden',
        ], $gitignore->full);
        $this->assertSame([
            'file.bak',
        ], $gitignore->short);
        $this->assertTrue($gitignore->isMatch('.hidden'));
        $this->assertTrue($gitignore->isMatch('.hidden/'));
        $this->assertTrue($gitignore->isMatch('.hidden/inside'));
        $this->assertTrue($gitignore->isMatch('file.bak'));
        $this->assertTrue($gitignore->isMatch('dir/file.bak'));
        $this->assertFalse($gitignore->isMatch('dir/.hidden'));
        $this->assertFalse($gitignore->isMatch('file.baks'));
        $this->assertFalse($gitignore->isMatch('dir/xfile.bak'));
    }
}
