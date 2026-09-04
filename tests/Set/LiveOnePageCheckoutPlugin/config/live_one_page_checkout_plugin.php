<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

/**
 * Mirrors config/sets/sylius/live-one-page-checkout-plugin/live-one-page-checkout-plugin.php with the
 * version bound dropped: sylius/live-one-page-checkout-plugin is not installed here, so the bound
 * registrations would resolve to inactive and the mapping would go untested.
 */
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\ChannelOnePageCheckoutAwareInterface',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\OrderAndItemPromotionTotalAwareInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\ChannelOnePageCheckoutAwareTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\LiveOnePageCheckoutPlugin\Entity\OrderAndItemPromotionTotalAwareTrait',
            'Sylius\LiveOnePageCheckoutPlugin\Entity\OrderShippingTaxTotalTrait',
        ],
    ]);
};
