<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Removing\Rector\Class_\RemoveTraitUseRector;
use Rector\Renaming\Rector\Name\RenameClassRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        'Sylius\PriceHistoryPlugin\Application\Calculator\ProductVariantLowestPriceCalculator' => 'Sylius\Component\Core\Calculator\ProductVariantPriceCalculator',
        'Sylius\PriceHistoryPlugin\Application\Calculator\ProductVariantLowestPriceCalculatorInterface' => 'Sylius\Component\Core\Calculator\ProductVariantPriceCalculatorInterface',
        'Sylius\PriceHistoryPlugin\Application\Checker\ProductVariantLowestPriceDisplayChecker' => 'Sylius\Component\Core\Checker\ProductVariantLowestPriceDisplayChecker',
        'Sylius\PriceHistoryPlugin\Application\Checker\ProductVariantLowestPriceDisplayCheckerInterface' => 'Sylius\Component\Core\Checker\ProductVariantLowestPriceDisplayCheckerInterface',
        'Sylius\PriceHistoryPlugin\Application\Command\ApplyLowestPriceOnChannelPricings' => 'Sylius\Bundle\CoreBundle\PriceHistory\Command\ApplyLowestPriceOnChannelPricings',
        'Sylius\PriceHistoryPlugin\Application\CommandDispatcher\ApplyLowestPriceOnChannelPricingsCommandDispatcherInterface' => 'Sylius\Bundle\CoreBundle\PriceHistory\CommandDispatcher\ApplyLowestPriceOnChannelPricingsCommandDispatcherInterface',
        'Sylius\PriceHistoryPlugin\Application\CommandDispatcher\BatchedApplyLowestPriceOnChannelPricingsCommandDispatcher' => 'Sylius\Bundle\CoreBundle\PriceHistory\CommandDispatcher\BatchedApplyLowestPriceOnChannelPricingsCommandDispatcher',
        'Sylius\PriceHistoryPlugin\Application\CommandHandler\ApplyLowestPriceOnChannelPricingsHandler' => 'Sylius\Bundle\CoreBundle\PriceHistory\CommandHandler\ApplyLowestPriceOnChannelPricingsHandler',
        'Sylius\PriceHistoryPlugin\Application\Logger\PriceChangeLogger' => 'Sylius\Bundle\CoreBundle\PriceHistory\Logger\PriceChangeLogger',
        'Sylius\PriceHistoryPlugin\Application\Logger\PriceChangeLoggerInterface' => 'Sylius\Bundle\CoreBundle\PriceHistory\Logger\PriceChangeLoggerInterface',
        'Sylius\PriceHistoryPlugin\Application\Processor\ProductLowestPriceBeforeDiscountProcessor' => 'Sylius\Bundle\CoreBundle\PriceHistory\Processor\ProductLowestPriceBeforeDiscountProcessor',
        'Sylius\PriceHistoryPlugin\Application\Processor\ProductLowestPriceBeforeDiscountProcessorInterface' => 'Sylius\Bundle\CoreBundle\PriceHistory\Processor\ProductLowestPriceBeforeDiscountProcessorInterface',
        'Sylius\PriceHistoryPlugin\Application\Remover\ChannelPricingLogEntriesRemoverInterface' => 'Sylius\Bundle\CoreBundle\PriceHistory\Remover\ChannelPricingLogEntriesRemoverInterface',
        'Sylius\PriceHistoryPlugin\Application\Templating\Helper\PriceHelper' => 'Sylius\Bundle\CoreBundle\Templating\Helper\PriceHelper',
        'Sylius\PriceHistoryPlugin\Application\Validator\ResourceInputDataPropertiesValidatorInterface' => 'Sylius\Bundle\ApiBundle\Validator\ResourceInputDataPropertiesValidatorInterface',
        'Sylius\PriceHistoryPlugin\Domain\Factory\ChannelFactory' => 'Sylius\Component\Core\Factory\ChannelFactory',
        'Sylius\PriceHistoryPlugin\Domain\Factory\ChannelPricingLogEntryFactory' => 'Sylius\Component\Core\Factory\ChannelPricingLogEntryFactory',
        'Sylius\PriceHistoryPlugin\Domain\Factory\ChannelPricingLogEntryFactoryInterface' => 'Sylius\Component\Core\Factory\ChannelPricingLogEntryFactoryInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelInterface' => 'Sylius\Component\Core\Model\ChannelInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfig' => 'Sylius\Component\Core\Model\ChannelPriceHistoryConfig',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigInterface' => 'Sylius\Component\Core\Model\ChannelPriceHistoryConfigInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface' => 'Sylius\Component\Core\Model\ChannelPricingInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingLogEntry' => 'Sylius\Component\Core\Model\ChannelPricingLogEntry',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingLogEntryInterface' => 'Sylius\Component\Core\Model\ChannelPricingLogEntryInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareInterface' => 'Sylius\Component\Core\Model\ChannelPricingInterface',
        'Sylius\PriceHistoryPlugin\Domain\Repository\ChannelPricingLogEntryRepositoryInterface' => 'Sylius\Component\Core\Repository\ChannelPricingLogEntryRepositoryInterface',
        'Sylius\PriceHistoryPlugin\Infrastructure\Cli\Command\ClearPriceHistoryCommand' => 'Sylius\Bundle\CoreBundle\PriceHistory\Cli\Command\ClearPriceHistoryCommand',
        'Sylius\PriceHistoryPlugin\Infrastructure\Doctrine\ORM\ChannelPricingLogEntryRepository' => 'Sylius\Bundle\CoreBundle\Doctrine\ORM\ChannelPricingLogEntryRepository',
        'Sylius\PriceHistoryPlugin\Infrastructure\Doctrine\ORM\ChannelPricingLogEntryRepositoryInterface' => 'Sylius\Component\Core\Repository\ChannelPricingLogEntryRepositoryInterface',
        'Sylius\PriceHistoryPlugin\Infrastructure\EntityObserver\CreateLogEntryOnPriceChangeObserver' => 'Sylius\Bundle\CoreBundle\PriceHistory\EntityObserver\CreateLogEntryOnPriceChangeObserver',
        'Sylius\PriceHistoryPlugin\Infrastructure\EntityObserver\EntityObserverInterface' => 'Sylius\Bundle\CoreBundle\PriceHistory\EntityObserver\EntityObserverInterface',
        'Sylius\PriceHistoryPlugin\Infrastructure\EntityObserver\ProcessLowestPricesOnChannelChangeObserver' => 'Sylius\Bundle\CoreBundle\PriceHistory\EntityObserver\ProcessLowestPricesOnChannelChangeObserver',
        'Sylius\PriceHistoryPlugin\Infrastructure\EntityObserver\ProcessLowestPricesOnChannelPriceHistoryConfigChangeObserver' => 'Sylius\Bundle\CoreBundle\PriceHistory\EntityObserver\ProcessLowestPricesOnChannelPriceHistoryConfigChangeObserver',
        'Sylius\PriceHistoryPlugin\Infrastructure\Event\OldChannelPricingLogEntriesEvents' => 'Sylius\Bundle\CoreBundle\PriceHistory\Event\OldChannelPricingLogEntriesEvents',
        'Sylius\PriceHistoryPlugin\Infrastructure\EventListener\OnFlushEntityObserverListener' => 'Sylius\Bundle\CoreBundle\PriceHistory\EventListener\OnFlushEntityObserverListener',
        'Sylius\PriceHistoryPlugin\Infrastructure\EventSubscriber\ChannelPricingLogEntryEventSubscriber' => 'Sylius\Bundle\CoreBundle\PriceHistory\EventSubscriber\ChannelPricingLogEntryEventSubscriber',
        'Sylius\PriceHistoryPlugin\Infrastructure\Form\Extension\ChannelTypeExtension' => 'Sylius\Bundle\CoreBundle\Form\Extension\ChannelTypeExtension',
        'Sylius\PriceHistoryPlugin\Infrastructure\Form\Type\ChannelPriceHistoryConfigType' => 'Sylius\Bundle\CoreBundle\Form\Type\ChannelPriceHistoryConfigType',
        'Sylius\PriceHistoryPlugin\Infrastructure\Provider\ProductVariantsPricesProvider' => 'Sylius\Component\Core\Provider\ProductVariantsPricesProvider',
        'Sylius\PriceHistoryPlugin\Infrastructure\Remover\ChannelPricingLogEntriesRemover' => 'Sylius\Bundle\CoreBundle\PriceHistory\Remover\ChannelPricingLogEntriesRemover',
        'Sylius\PriceHistoryPlugin\Infrastructure\Serializer\ChannelDenormalizer' => 'Sylius\Bundle\ApiBundle\Serializer\ChannelDenormalizer',
        'Sylius\PriceHistoryPlugin\Infrastructure\Serializer\ChannelPriceHistoryConfigDenormalizer' => 'Sylius\Bundle\ApiBundle\Serializer\ChannelPriceHistoryConfigDenormalizer',
        'Sylius\PriceHistoryPlugin\Infrastructure\Serializer\ProductVariantNormalizer' => 'Sylius\Bundle\ApiBundle\Serializer\ProductVariantNormalizer',
        'Sylius\PriceHistoryPlugin\Infrastructure\Twig\PriceExtension' => 'Sylius\Bundle\CoreBundle\Twig\PriceExtension',
        'Sylius\PriceHistoryPlugin\Infrastructure\Twig\SyliusVersionExtension' => 'Sylius\Bundle\CoreBundle\Twig\SyliusVersionExtension',
        'Sylius\PriceHistoryPlugin\Infrastructure\Validator\ResourceApiInputDataPropertiesValidator' => 'Sylius\Bundle\ApiBundle\Validator\ResourceApiInputDataPropertiesValidator',
    ]);
    $rectorConfig->ruleWithConfiguration(RemoveTraitUseRector::class, [
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigAwareTrait',
        'Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareTrait',
    ]);
};
