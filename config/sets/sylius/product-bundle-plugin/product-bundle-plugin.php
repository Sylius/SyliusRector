<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\OrderItem' => ['Sylius\ProductBundlePlugin\Entity\OrderItemInterface'],
        'Sylius\Component\Core\Model\Product' => ['Sylius\ProductBundlePlugin\Entity\ProductInterface'],
    ]);
    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\OrderItem' => ['Sylius\ProductBundlePlugin\Entity\ProductBundleOrderItemsAwareTrait'],
        'Sylius\Component\Core\Model\Product' => ['Sylius\ProductBundlePlugin\Entity\ProductBundlesAwareTrait'],
    ]);
    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\ProductBundlePlugin\Entity\ProductBundleOrderItemsAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeProductBundleOrderItems'),
        ],
    ]);
};
