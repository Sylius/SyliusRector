<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\NodeManipulator;

use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Stmt;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;

final class TraitManipulator
{
    private const BEFORE_TRAIT_TYPES = [TraitUse::class, Property::class, ClassMethod::class];

    public function addAsFirstTrait(Class_ $class, string $traitName): void
    {
        $traitUse = new TraitUse([new FullyQualified($traitName)]);
        $this->addTraitUse($class, $traitUse);
    }

    private function addTraitUse(Class_ $class, TraitUse $traitUse): void
    {
        foreach (self::BEFORE_TRAIT_TYPES as $type) {
            foreach ($class->stmts as $key => $classStmt) {
                if (! $classStmt instanceof $type) {
                    continue;
                }

                $class->stmts = $this->insertBefore($class->stmts, $traitUse, $key);

                return;
            }
        }

        $class->stmts[] = $traitUse;
    }

    /**
     * @param Stmt[] $stmts
     * @return Stmt[]
     */
    private function insertBefore(array $stmts, Stmt $stmt, int $key): array
    {
        array_splice($stmts, $key, 0, [$stmt]);

        return $stmts;
    }

    public function hasAliasForMethod(TraitUse $trait, string $methodName): bool
    {
        foreach ($trait->adaptations as $adaptation) {
            if (!$adaptation instanceof Alias) {
                continue;
            }

            if ($adaptation->method->toString() === $methodName) {
                return true;
            }
        }

        return false;
    }

    public function removeAliasForMethod(TraitUse $trait, string $methodName): void
    {
        foreach ($trait->adaptations as $key => $adaptation) {
            if (!$adaptation instanceof Alias) {
                continue;
            }

            if ($adaptation->method->toString() === $methodName) {
                unset($trait->adaptations[$key]);
            }
        }
    }
}
