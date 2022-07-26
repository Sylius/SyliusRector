<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface',
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\ChannelInterface',
        ],
    ]);
};
