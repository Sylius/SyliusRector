<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Namespace;

use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\Stmt\UseUse;
use Rector\Contract\Rector\ConfigurableRectorInterface;
use Rector\Rector\AbstractRector;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class ChangeNamespaceRector extends AbstractRector implements ConfigurableRectorInterface
{
    /**
     * @var array<string, string> Array where the key is the old namespace, and the value is the new namespace
     */
    private array $namespaceChanges = [];

    public function configure(array $configuration): void
    {
        $this->namespaceChanges = $configuration;
    }

    public function getNodeTypes(): array
    {
        return [Namespace_::class, Use_::class];
    }

    public function refactor(Node $node): ?Node
    {
        if ($node instanceof Namespace_) {
            $namespaceName = $this->getName($node);
            if ($namespaceName === null) {
                return null;
            }

            foreach ($this->namespaceChanges as $oldNamespace => $newNamespace) {
                if (str_starts_with($namespaceName, $oldNamespace)) {
                    $node->name = new Name(
                        str_replace($oldNamespace, $newNamespace, $namespaceName)
                    );

                    break;
                }
            }

            return $node;
        }

        // Handle "use" statements
        if ($node instanceof Use_) {
            /** @var UseUse $use */
            foreach ($node->uses as $use) {
                $useName = $this->getName($use->name);

                foreach ($this->namespaceChanges as $oldNamespace => $newNamespace) {
                    if (str_starts_with($useName, $oldNamespace)) {
                        $use->name = new Name(
                            str_replace($oldNamespace, $newNamespace, $useName)
                        );
                    }
                }
            }

            return $node;
        }

        return null;
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Change specified namespaces and use statements',
            []
        );
    }
}
