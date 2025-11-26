<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Set\SyliusProductBundle;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([SyliusProductBundle::PRODUCT_BUNDLE]);
};
