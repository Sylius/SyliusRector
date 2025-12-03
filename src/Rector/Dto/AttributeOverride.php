<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Dto;

final class AttributeOverride
{
    public function __construct(
        public readonly string $name,
        public readonly string $columnName,
        public readonly string $type = 'string',
        public readonly bool $nullable = false,
        public readonly ?int $length = null,
    ) {
    }
}
