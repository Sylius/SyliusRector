<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\NodeFactory;

use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\DeadCode\PhpDoc\TagRemover\ParamTagRemover;
use Rector\ValueObject\MethodName;
use Sylius\SyliusRector\ValueObject\PropertyWithPhpDocInfo;

final class ConstructorClassMethodFactory
{
    public function __construct(
        private PhpDocInfoFactory $phpDocInfoFactory,
        private ParamTagRemover $paramTagRemover,
    ) {
    }

    /**
     * @param PropertyWithPhpDocInfo[] $requiredPropertiesWithPhpDocInfos
     * @param Param[] $params
     */
    public function createConstructorClassMethod(array $requiredPropertiesWithPhpDocInfos, array $params): ClassMethod
    {
        $classMethod = new ClassMethod(MethodName::CONSTRUCT, [
            'flags' => Class_::MODIFIER_PUBLIC,
            'params' => $params,
        ]);

        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($classMethod);

        foreach ($requiredPropertiesWithPhpDocInfos as $requiredPropertyWithPhpDocInfo) {
            $paramTagValueNode = $requiredPropertyWithPhpDocInfo->getParamTagValueNode();
            $phpDocInfo->addTagValueNode($paramTagValueNode);
        }

        $this->paramTagRemover->removeParamTagsIfUseless($phpDocInfo, $classMethod);

        return $classMethod;
    }
}
