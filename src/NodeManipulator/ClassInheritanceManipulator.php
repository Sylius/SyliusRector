<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\NodeManipulator;

use PhpParser\Node\Stmt\Class_;
use PHPStan\Reflection\ClassReflection;
use Rector\Core\Reflection\ReflectionResolver;

final class ClassInheritanceManipulator
{
    public function __construct(
        private ReflectionResolver $reflectionResolver,
    ) {
    }

    public function isDerivative(Class_ $class, string $parentClassName): bool
    {
        $reflection = $this->reflectionResolver->resolveClassReflection($class);

        if (!$reflection instanceof ClassReflection) {
            return false;
        }

        $parentClasses = $reflection->getParentClassesNames();

        return in_array($parentClassName, $parentClasses, true);
    }
}
