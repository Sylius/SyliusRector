<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Dto;

final class Index
{
    /**
     * @param string[] $columns
     */
    public function __construct(
        public readonly string $name,
        public readonly array $columns,
    ) {
    }
}
