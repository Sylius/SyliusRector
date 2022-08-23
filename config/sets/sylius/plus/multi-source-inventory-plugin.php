<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\ProductVariant' => [
            'Sylius\MultiSourceInventoryPlugin\Domain\Model\ProductVariantInterface',
        ],
        'Sylius\Component\Core\Model\Shipment' => [
            'Sylius\MultiSourceInventoryPlugin\Domain\Model\ShipmentInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\ProductVariant' => [
            'Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceStocksAwareTrait',
        ],
        'Sylius\Component\Core\Model\Shipment' => [
            'Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceAwareTrait',
        ],
    ]);
};
