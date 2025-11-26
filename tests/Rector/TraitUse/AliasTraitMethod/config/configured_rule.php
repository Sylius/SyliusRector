<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\Class_;
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\TraitUse\AliasTraitMethodRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AliasTraitMethodRector::class, [
        'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait' => [
            [
                'traitMethod' => '__construct',
                'newMethodName' => 'initializeSomething',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
    ]);
};
