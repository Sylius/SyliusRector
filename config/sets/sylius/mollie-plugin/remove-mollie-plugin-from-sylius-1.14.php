<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Removing\Rector\Class_\RemoveTraitUseRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Removing\Rector\Class_\RemoveInterfacesRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RemoveTraitUseRector::class, [
        'Sylius\MolliePlugin\Entity\AbandonedEmailOrderTrait',
        'Sylius\MolliePlugin\Entity\MolliePaymentIdOrderTrait',
        'Sylius\MolliePlugin\Entity\QRCodeOrderTrait',
        'Sylius\MolliePlugin\Entity\RecurringOrderTrait',
        'Sylius\MolliePlugin\Entity\GatewayConfigTrait',
        'Sylius\MolliePlugin\Entity\ProductTrait',
        'Sylius\MolliePlugin\Entity\RecurringProductVariantTrait',
        'Sylius\MolliePlugin\Entity\OnboardingStatusAwareTrait',
    ]);
    $rectorConfig->ruleWithConfiguration(RemoveInterfacesRector::class, [
        'Sylius\MolliePlugin\Entity\OrderInterface',
        'Sylius\MolliePlugin\Entity\GatewayConfigInterface',
        'Sylius\MolliePlugin\Entity\ProductInterface',
        'Sylius\MolliePlugin\Entity\ProductVariantInterface',
        'Sylius\MolliePlugin\Entity\OnboardingStatusAwareInterface',
    ]);
};
