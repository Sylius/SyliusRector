<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\NodeManipulator;

use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;

final class TraitManipulator
{
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
