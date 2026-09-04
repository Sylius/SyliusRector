<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\ChannelOnePageCheckoutAwareInterface',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\OrderAndItemPromotionTotalAwareInterface',
        ],
    ], 'sylius/live-one-page-checkout-plugin', '>=0.1 <0.2');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\ChannelOnePageCheckoutAwareTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\OrderAndItemPromotionTotalAwareTrait',
            'Sylius\LiveOnePageCheckoutPlugin\Entity\OrderShippingTaxTotalTrait',
        ],
    ], 'sylius/live-one-page-checkout-plugin', '>=0.1 <0.2');
};
