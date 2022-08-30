<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\TraitUse;

use PhpParser\Node;
use PhpParser\Node\Stmt\TraitUse;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\Rector\AbstractRector;
use Sylius\SyliusRector\NodeManipulator\TraitManipulator;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Sylius\SyliusRector\Tests\Rector\TraitUse\AliasTraitMethod\AliasTraitMethodTest
 */
final class AliasTraitMethodRector extends AbstractRector implements ConfigurableRectorInterface
{
    private array $aliasTraitMethodRectorConfig = [];

    public function __construct(
        private TraitManipulator $traitManipulator,
    ) {
    }

    /**
     * @throws PoorDocumentationException
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Aliases the given trait\'s method to the given name',
            [
                new CodeSample(
                    <<<CODE_SAMPLE
                use Sylius\Component\Channel\Model\Channel as BaseChannel;
                
                class Channel extends BaseChannel
                {
                    use SomeTrait;
                }
                CODE_SAMPLE,
                    <<<CODE_SAMPLE
                use Sylius\Component\Channel\Model\Channel as BaseChannel;
                
                class Channel extends BaseChannel implements \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface
                {
                    use SomeTrait {
                        __construct as private initializeSomething;
                    }
                }
                CODE_SAMPLE
                ),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [TraitUse::class];
    }

    public function configure(array $configuration): void
    {
        $this->aliasTraitMethodRectorConfig = $configuration;
    }

    public function refactor(TraitUse|Node $node): Node
    {
        if (!$node instanceof TraitUse) {
            return $node;
        }

        foreach ($node->traits as $trait) {
            if (!$this->isTraitSupported($trait)) {
                continue;
            }

            foreach ($this->getConfigurationForTrait($trait) as $configurationEntry) {
                if ($this->traitManipulator->hasAliasForMethod($node, $configurationEntry['traitMethod'])) {
                    $this->traitManipulator->removeAliasForMethod($node, $configurationEntry['traitMethod']);
                }

                $node->adaptations[] = $this->createAlias($configurationEntry);
            }
        }

        return $node;
    }

    private function isTraitSupported(Node\Name $traitName): bool
    {
        return in_array($traitName->toString(), array_keys($this->aliasTraitMethodRectorConfig), true);
    }

    /**
     * @return array<string, array<string>>
     */
    private function getConfigurationForTrait(Node\Name $traitName): array
    {
        return $this->aliasTraitMethodRectorConfig[$traitName->toString()];
    }

    /**
     * @param array<string, string> $configuration
     */
    private function createAlias(array $configuration): Alias
    {
        return new Alias(null, $configuration['traitMethod'], (int) $configuration['visibility'], $configuration['newMethodName']);
    }
}
