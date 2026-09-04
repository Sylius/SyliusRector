<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Tests\Set\LiveOnePageCheckoutPlugin;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class LiveOnePageCheckoutPluginTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    /**
     * @return Iterator<string>
     */
    public function provideData(): Iterator
    {
        return self::yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/live_one_page_checkout_plugin.php';
    }
}
