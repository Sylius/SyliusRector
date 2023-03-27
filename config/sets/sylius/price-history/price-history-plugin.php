<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\PriceHistoryPlugin\Domain\Model\ChannelInterface',
        ],
        'Sylius\Component\Core\Model\ChannelPricing' => [
            'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface',
        ],
    ]);
    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigAwareTrait',
        ],
        'Sylius\Component\Core\Model\ChannelPricing' => [
            'Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareTrait',
        ],
    ]);
};
