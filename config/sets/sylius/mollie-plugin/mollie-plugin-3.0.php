<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Bundle\PayumBundle\Model\GatewayConfig' => [
            'Sylius\MolliePlugin\Entity\GatewayConfigInterface',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\MolliePlugin\Entity\OrderInterface',
        ],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\MolliePlugin\Entity\ProductInterface',
        ],
        'Sylius\Component\Core\Model\ProductVariant' => [
            'Sylius\MolliePlugin\Entity\ProductVariantInterface',
        ],
        'Sylius\Component\Core\Model\AdminUser' => [
            'Sylius\MolliePlugin\Entity\OnboardingStatusAwareInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Bundle\PayumBundle\Model\GatewayConfig' => [
            'Sylius\MolliePlugin\Entity\GatewayConfigTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\MolliePlugin\Entity\AbandonedEmailOrderTrait',
            'Sylius\MolliePlugin\Entity\RecurringOrderTrait',
            'Sylius\MolliePlugin\Entity\QRCodeOrderTrait',
            'Sylius\MolliePlugin\Entity\MolliePaymentIdOrderTrait',
        ],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\MolliePlugin\Entity\ProductTrait',
        ],
        'Sylius\Component\Core\Model\ProductVariant' => [
            'Sylius\MolliePlugin\Entity\RecurringProductVariantTrait',
        ],
        'Sylius\Component\Core\Model\AdminUser' => [
            'Sylius\MolliePlugin\Entity\OnboardingStatusAwareTrait',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\MolliePlugin\Entity\GatewayConfigTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeMollieGatewayConfig'),
        ],
    ]);
};
