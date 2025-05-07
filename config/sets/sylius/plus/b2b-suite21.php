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
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\B2BKit\Entity\ProductInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Product' => [
            'Sylius\B2BKit\Entity\OrganizationsAwareTrait',
            'Sylius\B2BKit\Entity\CustomerGroupsAwareTrait',
        ],
        'Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository' => [
            'Sylius\B2BKit\Doctrine\ORM\CreateProductQueryBuilderTrait',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AliasTraitMethodRector::class, [
        'Sylius\B2BKit\Entity\CustomerGroupsAwareTrait' => [
            [
                'traitMethod' => 'CustomerGroupsAwareTrait::__construct',
                'newMethodName' => 'initializeCustomerGroupsTrait',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
        'Sylius\B2BKit\Entity\OrganizationsAwareTrait' => [
            [
                'traitMethod' => 'OrganizationsAwareTrait::__construct',
                'newMethodName' => 'initializeOrganizationsTrait',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\B2BKit\Entity\CustomerGroupsAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeCustomerGroupsTrait'),
        ],
        'Sylius\B2BKit\Entity\OrganizationsAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeOrganizationsTrait'),
        ],
    ]);
};
