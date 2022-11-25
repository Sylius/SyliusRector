<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $services = $rectorConfig->services();
    $configurator = $services->defaults();

    $configurator->public();
    $configurator->autowire();
    $configurator->autoconfigure();

    $prototypeConfigurator = $services->load('Sylius\\SyliusRector\\', __DIR__ . '/../src');
    $prototypeConfigurator->exclude([__DIR__ . '/../src/Rector', __DIR__ . '/../src/ValueObject', __DIR__ . '/../src/PhpDoc/Node']);
};
