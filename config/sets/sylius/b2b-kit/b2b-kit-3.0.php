<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\Class_;
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;
use Sylius\SyliusRector\Rector\TraitUse\AliasTraitMethodRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => [
            'Sylius\B2BKit\Organization\Entity\AddressInterface',
        ],
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\B2BKit\HidePrices\Entity\ChannelInterface',
        ],
        'Sylius\Component\Core\Model\Customer' => [
            'Sylius\B2BKit\Organization\Entity\CustomerInterface',
        ],
        'Sylius\Component\Customer\Model\CustomerGroup' => [
            'Sylius\B2BKit\PricingLists\Entity\CustomerGroupInterface',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\B2BKit\Organization\Entity\OrderInterface',
        ],
        'Sylius\Component\Core\Model\ShopUser' => [
            'Sylius\B2BKit\Organization\Entity\ShopUserInterface',
        ],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\B2BKit\Organization\Entity\ProductInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => [
            'Sylius\B2BKit\Organization\Entity\AddressAwareTrait',
        ],
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\B2BKit\HidePrices\Entity\ChannelLoginRequiredTrait',
        ],
        'Sylius\Component\Core\Model\Customer' => [
            'Sylius\B2BKit\Organization\Entity\CustomerAwareTrait',
        ],
        'Sylius\Component\Customer\Model\CustomerGroup' => [
            'Sylius\B2BKit\PricingLists\Entity\CustomerGroupAwareTrait',
        ],
        'Sylius\Component\Core\Model\Order' => [
            'Sylius\B2BKit\Organization\Entity\OrderAwareTrait',
        ],
        'Sylius\Component\Core\Model\ShopUser' => [
            'Sylius\B2BKit\Organization\Entity\ShopUserAwareTrait',
        ],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\B2BKit\Organization\Entity\OrganizationsAwareTrait',
            'Sylius\B2BKit\Organization\Entity\CustomerGroupsAwareTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository' => [
            'Sylius\B2BKit\Organization\Doctrine\ORM\CreateProductQueryBuilderTrait',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AliasTraitMethodRector::class, [
        'Sylius\B2BKit\Organization\Entity\CustomerGroupsAwareTrait' => [
            [
                'traitMethod' => 'CustomerGroupsAwareTrait::__construct',
                'newMethodName' => 'initializeCustomerGroupsTrait',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
        'Sylius\B2BKit\Organization\Entity\OrganizationsAwareTrait' => [
            [
                'traitMethod' => 'OrganizationsAwareTrait::__construct',
                'newMethodName' => 'initializeOrganizationsTrait',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\B2BKit\Organization\Entity\CustomerGroupsAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeCustomerGroupsTrait'),
        ],
        'Sylius\B2BKit\Organization\Entity\OrganizationsAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeOrganizationsTrait'),
        ],
    ]);
};
