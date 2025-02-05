<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Set\SyliusMarketplace;
use Sylius\SyliusRector\Set\SyliusPlus;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../config/config.php');
    $rectorConfig->sets([SyliusMarketplace::SYLIUS_MARKETPLACE]);
    $rectorConfig->importNames();
};
