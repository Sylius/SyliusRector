<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\ReturnPlugin\Domain\Model\ChannelInterface',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\ReturnPlugin\Domain\Model\OrderInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\ReturnPlugin\Domain\Model\ReturnRequestsAllowedAwareTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\ReturnPlugin\Domain\Model\ReturnRequestAwareTrait',
        ],
    ]);
};
