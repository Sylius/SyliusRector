<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Namespace\ChangeNamespaceRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(ChangeNamespaceRector::class, [
        'BitBag\SyliusCmsPlugin' => 'Sylius\CmsPlugin',
    ]);
};
