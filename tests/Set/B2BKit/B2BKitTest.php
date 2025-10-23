<?php

declare(strict_types=1);

namespace Set\B2BKit;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

class B2BKitTest extends AbstractRectorTestCase
{
    /** @dataProvider provideData() */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    /** @return Iterator<string> */
    public function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/up-b2b-kit.php';
    }
}
