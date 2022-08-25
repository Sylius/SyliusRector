<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface',
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\ChannelInterface',
        ],
        'Sylius\Component\Core\Model\Customer' => [
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerInterface',
        ],
        'Sylius\Component\Core\Model\AdminUser' => [
            'Sylius\Component\Channel\Model\ChannelAwareInterface',
            'Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\LastLoginIpAwareInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\BusinessUnitAwareTrait',
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait',
        ],
        'Sylius\Component\Core\Model\Customer' => [
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait',
        ],
        'Sylius\Component\Core\Model\AdminUser' => [
            'Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\AdminChannelAwareTrait',
            'Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\LastLoginIpAwareTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository' => [
            'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\FindLatestCustomersQueryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository' => [
            'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\CreateOrderListQueryBuilderTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository' => [
            'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\CreatePaymentListQueryBuilderTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository' => [
            'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\CreateShipmentListQueryBuilderTrait',
        ],
    ]);
};
