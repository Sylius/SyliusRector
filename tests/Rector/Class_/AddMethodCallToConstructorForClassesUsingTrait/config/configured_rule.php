<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeSomething'),
        ],
        'Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\BusinessUnitAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeSomethingElse'),
        ],
    ]);
};
