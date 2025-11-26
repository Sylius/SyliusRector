<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Set\SyliusPriceHistory;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([SyliusPriceHistory::UPGRADE_SYLIUS_1_12_WITH_PRICE_HISTORY_PLUGIN_TO_SYLIUS_1_13]);
};
