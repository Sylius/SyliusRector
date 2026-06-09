<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\ProductVariant' => [
            'Sylius\ReturnPlugin\Domain\Model\ProductVariantInterface',
        ],
        'Sylius\Component\Core\Model\Shipment' => [
            'Sylius\ReturnPlugin\Domain\Model\ShipmentInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\ReturnPlugin\Domain\Model\WithdrawalConfigurationAwareTrait',
            'Sylius\ReturnPlugin\Domain\Model\ReturnRequestsAllowedAwareTrait',
        ],
        'Sylius\Component\Core\Model\ProductVariant' => [
            'Sylius\ReturnPlugin\Domain\Model\WithdrawalExclusionAwareTrait',
        ],
        'Sylius\Component\Core\Model\Shipment' => [
            'Sylius\ReturnPlugin\Domain\Model\DeliveredAtAwareTrait',
        ],
    ]);
};
