<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Node;

use PhpParser\Node\Arg;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use Rector\Enum\ObjectReference;
use Rector\ValueObject\MethodName;

final class NodeFactory
{
    /**
     * @param Param[] $params
     */
    public function createParentConstructWithParams(array $params): StaticCall
    {
        return new StaticCall(
            new Name(ObjectReference::PARENT),
            new Identifier(MethodName::CONSTRUCT),
            $this->createArgsFromParams($params)
        );
    }

    /**
     * @param Param[] $params
     * @return Arg[]
     */
    private function createArgsFromParams(array $params): array
    {
        $args = [];
        foreach ($params as $param) {
            $args[] = new Arg($param->var);
        }

        return $args;
    }
}
