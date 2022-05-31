<?php

declare(strict_types=1);

namespace Sylius\Rector\Set;

use Rector\Set\Contract\SetListInterface;

final class SyliusLevelSetList implements SetListInterface
{
    /**
     * @var string
     */
    final public const UP_TO_SYLIUS_1_10 = __DIR__ . '/../../config/sets/sylius/level/up-to-sylius-1-10.php';

    /**
     * @var string
     */
    final public const UP_TO_SYLIUS_1_11 = __DIR__ . '/../../config/sets/sylius/level/up-to-sylius-1-11.php';
}
