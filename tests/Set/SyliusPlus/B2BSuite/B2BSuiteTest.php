<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Tests\Set\SyliusPlus\B2BKit;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class B2BSuiteTest extends AbstractRectorTestCase
{
    /** @dataProvider provideData() */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    /** @return \Iterator<string> */
    public function provideData(): \Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
