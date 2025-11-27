<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\SetProvider\SyliusSetProvider;

return RectorConfig::configure()
    ->withSetProviders(SyliusSetProvider::class)
    ->withImportNames()
    ->withComposerBased(symfony: true)
;
