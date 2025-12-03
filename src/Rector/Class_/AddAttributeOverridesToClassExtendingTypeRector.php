<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Class_;

use PhpParser\Comment;
use PhpParser\Node;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Sylius\SyliusRector\NodeManipulator\ClassInheritanceManipulator;
use Sylius\SyliusRector\Rector\Dto\AttributeOverride;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Sylius\SyliusRector\Tests\Rector\Class_\AddAttributeOverridesToClassExtendingType\AddAttributeOverridesToClassExtendingTypeRectorTest
 */
final class AddAttributeOverridesToClassExtendingTypeRector extends AbstractRector implements ConfigurableRectorInterface
{
    /** @var array<string, AttributeOverride[]> */
    private array $configuration = [];

    public function __construct(
        private ClassInheritanceManipulator $classInheritanceManipulator,
    ) {
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Adds ORM\AttributeOverrides to classes extending the given type',
            [
                new CodeSample(
                    <<<'CODE_SAMPLE'
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Address as BaseAddress;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_address')]
class Address extends BaseAddress
{
}
CODE_SAMPLE,
                    <<<'CODE_SAMPLE'
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Address as BaseAddress;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_address')]
#[ORM\AttributeOverrides([
    new ORM\AttributeOverride(name: 'firstName', column: new ORM\Column(name: 'first_name', type: 'string', nullable: true)),
    new ORM\AttributeOverride(name: 'lastName', column: new ORM\Column(name: 'last_name', type: 'string', nullable: true)),
])]
class Address extends BaseAddress
{
}
CODE_SAMPLE,
                ),
            ],
        );
    }

    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    public function configure(array $configuration): void
    {
        $this->configuration = $configuration;
    }

    /**
     * @param Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        $hasChanges = false;

        foreach ($this->configuration as $className => $overrides) {
            if (!$this->classInheritanceManipulator->isDerivative($node, $className)) {
                continue;
            }

            if ($this->hasAttributeOverrides($node)) {
                continue;
            }

            $this->addAttributeOverrides($node, $overrides);
            $hasChanges = true;
        }

        return $hasChanges ? $node : null;
    }

    private function hasAttributeOverrides(Class_ $node): bool
    {
        foreach ($node->attrGroups as $attrGroup) {
            foreach ($attrGroup->attrs as $attr) {
                $attrName = $attr->name->toString();
                if (
                    $attrName === 'Doctrine\ORM\Mapping\AttributeOverrides' ||
                    $attrName === 'ORM\AttributeOverrides' ||
                    $attrName === 'AttributeOverrides'
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param AttributeOverride[] $overrides
     */
    private function addAttributeOverrides(Class_ $node, array $overrides): void
    {
        $overrideItems = [];
        $isFirst = true;

        foreach ($overrides as $override) {
            $newExpr = $this->createAttributeOverrideNew($override);

            if ($isFirst) {
                $newExpr->setAttribute('comments', [new Comment("\n        ")]);
                $isFirst = false;
            } else {
                $newExpr->setAttribute('comments', [new Comment("\n        ")]);
            }

            $overrideItems[] = new ArrayItem($newExpr);
        }

        $array = new Array_($overrideItems, ['kind' => Array_::KIND_SHORT]);

        $attribute = new Attribute(
            new FullyQualified('Doctrine\ORM\Mapping\AttributeOverrides'),
            [new Arg($array)],
        );

        $node->attrGroups[] = new AttributeGroup([$attribute]);
    }

    private function createAttributeOverrideNew(AttributeOverride $override): New_
    {
        $columnArgs = [
            new Arg(new String_($override->columnName), false, false, [], new Identifier('name')),
            new Arg(new String_($override->type), false, false, [], new Identifier('type')),
            new Arg(
                $override->nullable ? new ConstFetch(new Name('true')) : new ConstFetch(new Name('false')),
                false,
                false,
                [],
                new Identifier('nullable'),
            ),
        ];

        if ($override->length !== null) {
            $columnArgs[] = new Arg(new Int_($override->length), false, false, [], new Identifier('length'));
        }

        $columnNew = new New_(
            new FullyQualified('Doctrine\ORM\Mapping\Column'),
            $columnArgs,
        );

        return new New_(
            new FullyQualified('Doctrine\ORM\Mapping\AttributeOverride'),
            [
                new Arg(new String_($override->name), false, false, [], new Identifier('name')),
                new Arg($columnNew, false, false, [], new Identifier('column')),
            ],
        );
    }
}
