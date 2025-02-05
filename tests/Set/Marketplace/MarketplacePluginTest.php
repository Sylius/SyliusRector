<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Tests\Set\Marketplace;

use Rector\Testing\PHPUnit\AbstractRectorTestCase;

final class MarketplacePluginTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(string $file): void
    {
        $this->doTestFile($file);
    }

    /**
     * @return \Iterator<string>
     */
    public function provideData(): \Iterator
    {
        $files = self::yieldFilesFromDirectory(__DIR__ . '/Fixture');

        foreach ($files as $file) {
            yield $file;
        }
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
