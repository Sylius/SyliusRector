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
        ];
    }
}
