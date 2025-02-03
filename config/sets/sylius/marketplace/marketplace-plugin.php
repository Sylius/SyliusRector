<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\MarketplaceSuite\Component\Order\Model\OrderInterface',
        ],
        'Sylius\Component\Core\Model\OrderItem' => [
            'Sylius\MarketplaceSuite\Component\Order\Model\OrderItemInterface',
        ],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\MarketplaceSuite\Component\Product\Entity\ProductInterface',
        ],
        'Sylius\Component\Core\Model\Shipment' => [
            'Sylius\MarketplaceSuite\Component\Order\Model\ShipmentInterface',
        ],
        'Sylius\Component\Core\Model\ShopUser' => [
            'Sylius\MarketplaceSuite\Component\Vendor\Model\ShopUserInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository' => [
            'Sylius\MarketplaceSuite\Component\Vendor\Repository\CustomerRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository' => [
            'Sylius\MarketplaceSuite\Component\Order\Repository\OrderRepositoryInterface',
            'Sylius\MarketplaceSuite\Component\Product\Repository\OrderRepositoryInterface',
        ],
        'Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository' => [
            'Sylius\MarketplaceSuite\Component\Settlement\Repository\ChannelRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository' => [
            'Sylius\MarketplaceSuite\Component\Order\Repository\PaymentRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\ProductRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductReviewRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\ProductReviewRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\ProductVariantRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository' => [
            'Sylius\MarketplaceSuite\Component\Order\Repository\ShipmentRepositoryInterface',
        ],
        'Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository' => [
            'Sylius\MarketplaceSuite\Component\Vendor\Repository\TaxonRepositoryInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\OrderItem' => [
            'Sylius\MarketplaceSuite\Component\Order\Model\OrderItemTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\MarketplaceSuite\Component\Order\Model\OrderTrait',
        ],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\MarketplaceSuite\Component\Product\Model\ProductTrait',
        ],
        'Sylius\Component\Core\Model\Shipment' => [
            'Sylius\MarketplaceSuite\Component\Order\Model\ShipmentTrait',
        ],
        'Sylius\Component\Core\Model\ShopUser' => [
            'Sylius\MarketplaceSuite\Component\Vendor\Model\ShopUserTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\OrderRepositoryTrait',
            'Sylius\MarketplaceSuite\Component\Order\Repository\OrderRepositoryTrait',
        ],
        'Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository' => [
            'Sylius\MarketplaceSuite\Component\Settlement\Repository\ChannelRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository' => [
            'Sylius\MarketplaceSuite\Component\Vendor\Repository\CustomerRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository' => [
            'Sylius\MarketplaceSuite\Component\Order\Repository\PaymentRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\ProductRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductReviewRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\ProductReviewRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository' => [
            'Sylius\MarketplaceSuite\Component\Product\Repository\ProductVariantRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository' => [
            'Sylius\MarketplaceSuite\Component\Order\Repository\ShipmentRepositoryTrait',
        ],
        'Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository' => [
            'Sylius\MarketplaceSuite\Component\Vendor\Repository\TaxonRepositoryTrait',
        ],
    ]);
};
