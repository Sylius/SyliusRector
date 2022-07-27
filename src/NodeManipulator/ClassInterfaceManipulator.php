<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\NodeManipulator;

use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt\Class_;
use Rector\NodeNameResolver\NodeNameResolver;

final class ClassInterfaceManipulator
{
    public function __construct(
        private NodeNameResolver $nodeNameResolver,
    ) {
    }

    public function hasInterface(Class_ $class, string $interfaceName): bool
    {
        foreach ($class->implements as $implement) {
            if (!$this->nodeNameResolver->isName($implement, $interfaceName)) {
                continue;
            }

            return true;
        }

        return false;
    }

    /**
     * @param string[] $interfaces
     */
    public function addInterfaces(Class_ $class, array $interfaces): void
    {
        foreach ($interfaces as $interface) {
            if ($this->hasInterface($class, $interface)) {
                continue;
            }

            $class->implements[] = new FullyQualified($interface);
        }
    }
}
