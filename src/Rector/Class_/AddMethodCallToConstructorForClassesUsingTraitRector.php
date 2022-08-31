<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use Rector\Compatibility\NodeFactory\ConstructorClassMethodFactory;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\NodeManipulator\ClassInsertManipulator;
use Rector\Core\NodeManipulator\ClassManipulator;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\ValueObject\MethodName;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

/**
 * @see \Sylius\SyliusRector\Tests\Rector\Class_\AddMethodCallToConstructorForClassesUsingTrait\AddMethodCallToConstructorForClassesUsingTraitTest
 */
final class AddMethodCallToConstructorForClassesUsingTraitRector extends AbstractRector implements ConfigurableRectorInterface
{
    private array $configuration = [];

    public function __construct(
        private ConstructorClassMethodFactory $constructorClassMethodFactory,
        private ClassInsertManipulator $classInsertManipulator,
        private ClassManipulator $classManipulator,
    ) {
    }

    /**
     * @throws PoorDocumentationException
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Adds given method calls to constructor for classes using given trait',
            [
                new CodeSample(
                    <<<CODE_SAMPLE
                use Sylius\Component\Core\Model\Channel as BaseChannel;

                class Channel extends BaseChannel
                {
                    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
                }
                CODE_SAMPLE,
                    <<<CODE_SAMPLE
                use Sylius\Component\Core\Model\Channel as BaseChannel;

                class Channel extends BaseChannel
                {
                    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
                    public function __construct()
                    {
                        \$this->initializeSomething();
                    }
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
        $this->configuration = $configuration;
    }

    /**
     * @param Class_ $node
     * @throws \Exception
     */
    public function refactor(Node $node): Node|array|null
    {
        $newConstructorStmts = [];

        foreach ($this->configuration as $structureName => $methodCallConfiguration) {
            if (trait_exists($structureName)) {
                $newConstructorStmts = array_merge($newConstructorStmts, $this->processTrait($node, $structureName, $methodCallConfiguration));

                continue;
            }

            throw new \Exception('Trait not found: ' . $structureName);
        }

        if (count($newConstructorStmts) === 0) {
            return $node;
        }

        $constructor = $this->getOrCreateConstructorMethod($node);

        foreach ($newConstructorStmts as $newConstructorStmt) {
            if (!$newConstructorStmt instanceof Expression || !$newConstructorStmt->expr instanceof MethodCall) {
                continue;
            }

            if ($this->isConstructMethodCallAlreadyExisting($constructor, $newConstructorStmt->expr)) {
                continue;
            }

            $constructor->stmts[] = $newConstructorStmt;
        }

        return $node;
    }

    /**
     * @param array<AddMethodCallToConstructorForClassesUsingTrait> $methodsCallsConfiguration
     * @return array<Node>
     */
    private function processTrait(Class_ $node, string $traitName, array $methodsCallsConfiguration): array
    {
        if (! $this->classManipulator->hasTrait($node, $traitName)) {
            return [];
        }

        $nodes = [];

        foreach ($methodsCallsConfiguration as $methodCallConfiguration) {
            $methodCall = $this->nodeFactory->createMethodCall(
                $methodCallConfiguration->getVariable(),
                $methodCallConfiguration->getMethod(),
                $methodCallConfiguration->getArguments(),
            );

            $nodes[] = new Expression($methodCall);
        }

        return $nodes;
    }

    private function getOrCreateConstructorMethod(Class_ $node): ClassMethod
    {
        $constructor = $node->getMethod(MethodName::CONSTRUCT);

        if (null === $constructor) {
            $constructor = $this->constructorClassMethodFactory->createConstructorClassMethod([], []);
            $constructor->stmts = [new Expression($this->nodeFactory->createParentConstructWithParams([]))];
            $this->classInsertManipulator->addAsFirstMethod($node, $constructor);
        }

        return $constructor;
    }

    private function isConstructMethodCallAlreadyExisting(ClassMethod $constructor, MethodCall $newMethodCall): bool
    {
        foreach ($constructor->stmts as $stmt) {
            if (! $stmt instanceof Expression) {
                continue;
            }

            if (! $stmt->expr instanceof MethodCall) {
                continue;
            }

            if (! $this->areMethodCallsEqual($stmt->expr, $newMethodCall)) {
                continue;
            }

            return true;
        }

        return false;
    }

    private function areMethodCallsEqual(MethodCall $methodCall, MethodCall $anotherMethodCall): bool
    {
        return $methodCall->var instanceof Variable
            && $anotherMethodCall->var instanceof Variable
            && $methodCall->var->name === $anotherMethodCall->var->name
            && $methodCall->name instanceof Identifier
            && $anotherMethodCall->name instanceof Identifier
            && $methodCall->name->name === $anotherMethodCall->name->name
            && $methodCall->args === $anotherMethodCall->args
        ;
    }
}
