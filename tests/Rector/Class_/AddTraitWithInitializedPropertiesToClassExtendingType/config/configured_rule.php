<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddTraitWithInitializedPropertiesToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(AddTraitWithInitializedPropertiesToClassExtendingTypeRector::class, [
        'Sylius\Component\Product\Model\Product' => [
            'Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceStocksAwareTrait',
        ],
    ]);
};
