<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\SetProvider;

use Rector\Set\Contract\SetProviderInterface;
use Rector\Set\ValueObject\ComposerTriggeredSet;

final class SyliusSetProvider implements SetProviderInterface
{
    /** @return ComposerTriggeredSet[] */
    public function provide(): array
    {
        return [
            new ComposerTriggeredSet(
                'symfony',
                'bitbag/elasticsearch-plugin',
                '5.2',
                __DIR__ . '/../../config/sets/bitbag/elasticsearch-plugin/elasticsearch-plugin-5.2.php'
            ),

            new ComposerTriggeredSet(
                'symfony',
                'sylius/b2b-kit',
                '3.0',
                __DIR__ . '/../../config/sets/sylius/b2b-kit/b2b-kit-3.0.php'
            ),
        ];
    }
}
