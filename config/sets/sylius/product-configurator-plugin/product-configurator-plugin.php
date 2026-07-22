<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Product' => ['Sylius\ProductConfiguratorPlugin\Entity\ProductInterface'],
    ]);
    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\OrderItem' => ['Sylius\ProductConfiguratorPlugin\Entity\Traits\OrderItemCustomizationsTrait'],
        'Sylius\Component\Core\Model\Product' => ['Sylius\ProductConfiguratorPlugin\Entity\Traits\ProductCustomizationsTrait'],
    ]);
};
