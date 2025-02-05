<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Tests\Set\PriceHistory;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class UpgradeSylius112WithPriceHistoryPluginToSylius113Test extends AbstractRectorTestCase
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
        return __DIR__ . '/config/configured_rule.php';
    }
}
