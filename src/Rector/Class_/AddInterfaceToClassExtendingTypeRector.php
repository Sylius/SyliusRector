<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\Rector\AbstractRector;
use Sylius\SyliusRector\NodeManipulator\ClassInheritanceManipulator;
use Sylius\SyliusRector\NodeManipulator\ClassInterfaceManipulator;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\AddInterfaceToClassExtendingTypeTest
 */
final class AddInterfaceToClassExtendingTypeRector extends AbstractRector implements ConfigurableRectorInterface
{
    private array $addInterfaceToClassExtendingTypeRectorConfig = [];

    public function __construct(
        private ClassInheritanceManipulator $classInheritanceManipulator,
        private ClassInterfaceManipulator $classInterfaceManipulator,
    ) {
    }

    /**
     * @throws PoorDocumentationException
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Adds the given set of interfaces to the classes extending the given type',
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
        $this->addInterfaceToClassExtendingTypeRectorConfig = $configuration;
    }

    /**
     * @param Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        foreach ($this->addInterfaceToClassExtendingTypeRectorConfig as $className => $interfaces) {
            if (!$this->classInheritanceManipulator->isDerivative($node, $className)) {
                continue;
            }

            $this->classInterfaceManipulator->addInterfaces($node, $interfaces);
        }

        return $node;
    }
}
