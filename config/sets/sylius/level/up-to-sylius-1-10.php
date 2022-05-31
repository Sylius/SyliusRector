<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\Rector\Set\SyliusSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([SyliusSetList::SYLIUS_1_10]);
};
