<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Tests\Set\AdyenPlugin;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class AdyenPlugin10 extends AbstractRectorTestCase
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
        return __DIR__ . '/config/adyen_plugin_1_0.php';
    }
}
