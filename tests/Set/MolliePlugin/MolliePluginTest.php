<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class MolliePluginTest extends AbstractRectorTestCase
{
    /** @dataProvider provideData() */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    /** @return Iterator<string> */
    public function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture/Add');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/mollie_plugin.php';
    }
}
