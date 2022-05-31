<?php

declare(strict_types=1);

namespace Sylius\Rector\Set;

use Rector\Set\Contract\SetListInterface;

final class SyliusSetList implements SetListInterface
{
    /**
     * @var string
     */
    final public const SYLIUS_1_10 = __DIR__ . '/../../config/sets/sylius/sylius-1-10.php';
    /**
     * @var string
     */
    final public const SYLIUS_1_11 = __DIR__ . '/../../config/sets/sylius/sylius-1-11.php';
}
