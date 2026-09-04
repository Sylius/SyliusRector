<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withSets([
        __DIR__ . '/sets/bitbag/elasticsearch-plugin/elasticsearch-plugin.php',
        __DIR__ . '/sets/sylius/b2b-kit/b2b-kit.php',
        __DIR__ . '/sets/sylius/live-one-page-checkout-plugin/live-one-page-checkout-plugin.php',
        __DIR__ . '/sets/sylius/product-configuration-plugin/product-configuration-plugin.php',
    ])
    ->withImportNames()
    ->withComposerBased(symfony: true)
;
