<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Dto;

final class AddMethodCallToConstructorForClassesUsingTrait
{
    /**
     * @param array<array-key, mixed> $arguments
     */
    public function __construct(
        private string $variable,
        private string $method,
        private array $arguments = [],
    ) {
    }

    public function getVariable(): string
    {
        return $this->variable;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array<array-key, mixed>
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }
}
