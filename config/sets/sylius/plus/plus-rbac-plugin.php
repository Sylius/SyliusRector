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
        'Sylius\Component\Core\Model\AdminUser' => [
            'Sylius\PlusRbacPlugin\Domain\Model\AdminUserInterface',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\AdminUser' => [
            'Sylius\PlusRbacPlugin\Domain\Model\ToggleablePermissionCheckerTrait',
            'Sylius\PlusRbacPlugin\Domain\Model\RoleableTrait',
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AliasTraitMethodRector::class, [
        'Sylius\PlusRbacPlugin\Domain\Model\RoleableTrait' => [
            [
                'traitMethod' => '__construct',
                'newMethodName' => 'initializeRoleableTrait',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
    ]);

    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\PlusRbacPlugin\Domain\Model\RoleableTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeRoleableTrait'),
        ],
    ]);
};
