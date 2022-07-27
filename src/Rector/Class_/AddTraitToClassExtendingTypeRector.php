<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\NodeManipulator\ClassInsertManipulator;
use Rector\Core\NodeManipulator\ClassManipulator;
use Rector\Core\Rector\AbstractRector;
use Sylius\SyliusRector\NodeManipulator\ClassInheritanceManipulator;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Sylius\SyliusRector\Tests\Rector\Class_\AddTraitToClassExtendingType\AddTraitToClassExtendingTypeTest
 */
final class AddTraitToClassExtendingTypeRector extends AbstractRector implements ConfigurableRectorInterface
{
    private array $addTraitToClassExtendingTypeRectorConfig = [];

    public function __construct(
        private ClassInheritanceManipulator $classInheritanceManipulator,
        private ClassManipulator $classManipulator,
        private ClassInsertManipulator $classInsertManipulator,
    ){
    }

    /**
     * @throws PoorDocumentationException
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Adds the given set of traits to the classes extending the given type',
            [
                new CodeSample(
                <<<CODE_SAMPLE
                use Sylius\Component\Channel\Model\Channel as BaseChannel;
                
                class Channel extends BaseChannel
                {
                }
                CODE_SAMPLE,
                <<<CODE_SAMPLE
                use Sylius\Component\Channel\Model\Channel as BaseChannel;
                
                class Channel extends BaseChannel implements \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface
                {
                }
                CODE_SAMPLE
                ),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    public function configure(array $configuration): void
    {
        $this->addTraitToClassExtendingTypeRectorConfig = $configuration;
    }

    /**
     * @param Class_ $node
     */
    public function refactor(Node $node): Node|array|null
    {
        foreach ($this->addTraitToClassExtendingTypeRectorConfig as $className => $traits) {
            if (!$this->classInheritanceManipulator->isDerivative($node, $className)) {
                continue;
            }

            foreach ($traits as $trait) {
                if ($this->classManipulator->hasTrait($node, $trait)) {
                    continue;
                }

                $this->classInsertManipulator->addAsFirstTrait($node, $trait);
            }
        }

        return $node;
    }
}
