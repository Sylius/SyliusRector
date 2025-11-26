<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Set\SyliusPriceHistory;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([SyliusPriceHistory::PRICE_HISTORY_PLUGIN]);
};
