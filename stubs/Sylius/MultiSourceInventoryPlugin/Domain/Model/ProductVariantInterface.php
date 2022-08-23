<?php

declare(strict_types=1);

namespace Sylius\MultiSourceInventoryPlugin\Domain\Model;

if (class_exists('Sylius\MultiSourceInventoryPlugin\Domain\Model\ProductVariantInterface')) {
    return;
}

interface ProductVariantInterface
{
}
