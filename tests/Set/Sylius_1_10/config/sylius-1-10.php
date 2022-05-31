<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\Rector\Set\SyliusSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../config/config.php');
    $rectorConfig->sets([SyliusSetList::SYLIUS_1_10]);
};
