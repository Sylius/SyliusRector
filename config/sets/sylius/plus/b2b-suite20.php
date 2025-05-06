<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => [
            'Sylius\B2BKit\Entity\AddressInterface',
        ],
        'Sylius\Component\Core\Model\Customer' => [
            'Sylius\B2BKit\Entity\CustomerInterface',
        ],
        'Sylius\Component\Customer\Model\CustomerGroup' => [
            'Sylius\B2BKit\Entity\CustomerGroupInterface',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\B2BKit\Entity\OrderInterface',
        ],
        'Sylius\Component\Core\Model\ShopUser' => [
            'Sylius\B2BKit\Entity\ShopUserInterface',
        ],
    ]);
    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => [
            'Sylius\B2BKit\Entity\AddressAwareTrait',
        ],
        'Sylius\Component\Core\Model\Customer' => [
            'Sylius\B2BKit\Entity\CustomerAwareTrait',
        ],
        'Sylius\Component\Customer\Model\CustomerGroup' => [
            'Sylius\B2BKit\Entity\CustomerGroupAwareTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\B2BKit\Entity\OrderAwareTrait',
        ],
        'Sylius\Component\Core\Model\ShopUser' => [
            'Sylius\B2BKit\Entity\ShopUserAwareTrait',
        ],
    ]);
};
