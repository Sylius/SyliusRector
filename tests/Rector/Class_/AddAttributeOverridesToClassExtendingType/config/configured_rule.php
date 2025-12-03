<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddAttributeOverridesToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AttributeOverride;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddAttributeOverridesToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Address' => [
            new AttributeOverride('firstName', 'first_name', 'string', true),
            new AttributeOverride('lastName', 'last_name', 'string', true),
        ],
    ]);
};
