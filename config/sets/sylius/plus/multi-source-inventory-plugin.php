<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\Class_;
use Rector\Config\RectorConfig;
use Rector\DependencyInjection\Rector\ClassMethod\AddMethodParentCallRector;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;
use Sylius\SyliusRector\Rector\TraitUse\AliasTraitMethodRector;

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

    $rectorConfig->ruleWithConfiguration(AliasTraitMethodRector::class, [
        'Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceStocksAwareTrait' => [
            [
                'traitMethod' => '__construct',
                'newMethodName' => 'initializeInventorySourceStocksTrait',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceStocksAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeInventorySourceStocksTrait'),
        ],
    ]);
};
