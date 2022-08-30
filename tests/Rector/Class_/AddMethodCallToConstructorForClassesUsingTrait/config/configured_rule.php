<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');
    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait' => [
            [
                'variableName' => 'this',
                'method' => 'initializeSomething',
                'arguments' => [],
            ],
        ],
        'Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\BusinessUnitAwareTrait' => [
            [
                'variableName' => 'this',
                'method' => 'initializeSomethingElse',
                'arguments' => [],
            ],
        ],
    ]);
};
