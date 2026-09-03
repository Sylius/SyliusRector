<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddIndexToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\Index;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddIndexToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Order' => [new Index('idx_order_number', ['number'])],
        'Sylius\Component\Core\Model\ProductVariant' => [
            new Index('idx_product_variant_code', ['code']),
            new Index('idx_product_variant_position', ['position']),
        ],
    ]);
};
