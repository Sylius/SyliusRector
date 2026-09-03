<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\Class_;
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddAttributeOverridesToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddIndexToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;
use Sylius\SyliusRector\Rector\Dto\AttributeOverride;
use Sylius\SyliusRector\Rector\Dto\Index;
use Sylius\SyliusRector\Rector\TraitUse\AliasTraitMethodRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => ['Sylius\B2BKit\Organization\Entity\AddressInterface'],
        'Sylius\Component\Core\Model\Channel' => ['Sylius\B2BKit\HidePrices\Entity\ChannelInterface'],
        'Sylius\Component\Core\Model\Customer' => ['Sylius\B2BKit\Organization\Entity\CustomerInterface'],
        'Sylius\Component\Customer\Model\CustomerGroup' => [
            'Sylius\B2BKit\PricingLists\Entity\CustomerGroupInterface',
        ],
        'Sylius\Component\Core\Model\Order' => ['Sylius\B2BKit\Organization\Entity\OrderInterface'],
        'Sylius\Component\Core\Model\ShopUser' => ['Sylius\B2BKit\Organization\Entity\ShopUserInterface'],
        'Sylius\Component\Core\Model\Product' => ['Sylius\B2BKit\Organization\Entity\ProductInterface'],
    ], 'sylius/b2b-kit', '>=3.0 <5.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddAttributeOverridesToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => [
            new AttributeOverride('firstName', 'first_name', 'string', true),
            new AttributeOverride('lastName', 'last_name', 'string', true),
        ],
    ], 'sylius/b2b-kit', '>=3.0 <5.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => ['Sylius\B2BKit\Organization\Entity\AddressAwareTrait'],
        'Sylius\Component\Core\Model\Channel' => ['Sylius\B2BKit\HidePrices\Entity\ChannelLoginRequiredTrait'],
        'Sylius\Component\Core\Model\Customer' => ['Sylius\B2BKit\Organization\Entity\CustomerAwareTrait'],
        'Sylius\Component\Customer\Model\CustomerGroup' => [
            'Sylius\B2BKit\PricingLists\Entity\CustomerGroupAwareTrait',
        ],
        'Sylius\Component\Core\Model\Order' => ['Sylius\B2BKit\Organization\Entity\OrderAwareTrait'],
        'Sylius\Component\Core\Model\ShopUser' => ['Sylius\B2BKit\Organization\Entity\ShopUserAwareTrait'],
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\B2BKit\Organization\Entity\OrganizationsAwareTrait',
            'Sylius\B2BKit\Organization\Entity\CustomerGroupsAwareTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository' => [
            'Sylius\B2BKit\Organization\Doctrine\ORM\CreateProductQueryBuilderTrait',
        ],
    ], 'sylius/b2b-kit', '>=3.0 <5.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(
        AddMethodCallToConstructorForClassesUsingTraitRector::class,
        [
            'Sylius\B2BKit\Organization\Entity\CustomerGroupsAwareTrait' => [
                new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeCustomerGroupsTrait'),
            ],
            'Sylius\B2BKit\Organization\Entity\OrganizationsAwareTrait' => [
                new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeOrganizationsTrait'),
            ],
        ],
        'sylius/b2b-kit',
        '>=3.0 <5.0',
    );

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Payment' => ['Sylius\B2BKit\TradeCredit\Entity\PaymentInterface'],
    ], 'sylius/b2b-kit', '>=4.0 <5.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Payment' => ['Sylius\B2BKit\TradeCredit\Entity\TradeCreditPaymentTrait'],
    ], 'sylius/b2b-kit', '>=4.0 <5.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddIndexToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Payment' => [
            new Index('idx_payment_credit_approval_state', ['credit_approval_state']),
        ],
    ], 'sylius/b2b-kit', '>=4.0 <5.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\AddressRepository' => [
            'Sylius\B2BKit\Organization\Repository\AddressRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository' => [
            'Sylius\B2BKit\Organization\Repository\CustomerRepositoryInterface',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository' => [
            'Sylius\B2BKit\Organization\Repository\OrderRepositoryInterface',
        ],
    ], 'sylius/b2b-kit', '>=3.0 <4.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\AddressRepository' => [
            'Sylius\B2BKit\Organization\Repository\AddressRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository' => [
            'Sylius\B2BKit\Organization\Repository\CustomerRepositoryTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository' => [
            'Sylius\B2BKit\Organization\Repository\OrderRepositoryTrait',
        ],
    ], 'sylius/b2b-kit', '>=3.0 <4.0');

    $rectorConfig->ruleWithConfigurationComposerVersionBound(AliasTraitMethodRector::class, [
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
    ], 'sylius/b2b-kit', '>=3.0 <3.0.2');
};
