<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Removing\Rector\Class_\RemoveTraitUseRector;
use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RenameNamespaceRector::class, [
        'Sylius\PriceHistoryPlugin\Application\Calculator\ProductVariantLowestPriceCalculator' => 'Sylius\Component\Core\Calculator\ProductVariantPriceCalculator',
        'Sylius\PriceHistoryPlugin\Application\Checker' => 'Sylius\Component\Core\Checker',
        'Sylius\PriceHistoryPlugin\Application\Command' => 'Sylius\Bundle\CoreBundle\PriceHistory\Command',
        'Sylius\PriceHistoryPlugin\Application\CommandDispatcher' => 'Sylius\Bundle\CoreBundle\PriceHistory\CommandDispatcher',
        'Sylius\PriceHistoryPlugin\Application\CommandHandler' => 'Sylius\Bundle\CoreBundle\PriceHistory\CommandHandler',
        'Sylius\PriceHistoryPlugin\Application\Logger' => 'Sylius\Bundle\CoreBundle\PriceHistory\Logger',
        'Sylius\PriceHistoryPlugin\Application\Processor' => 'Sylius\Bundle\CoreBundle\PriceHistory\Processor',
        'Sylius\PriceHistoryPlugin\Application\Remover\ChannelPricingLogEntriesRemoverInterface' => 'Sylius\Bundle\CoreBundle\PriceHistory\Remover\ChannelPricingLogEntriesRemoverInterface',
        'Sylius\PriceHistoryPlugin\Application\Templating\Helper' => 'Sylius\Bundle\CoreBundle\Templating\Helper',
        'Sylius\PriceHistoryPlugin\Application\Validator\ResourceInputDataPropertiesValidatorInterface' => 'Sylius\Bundle\ApiBundle\Validator\ResourceInputDataPropertiesValidatorInterface',
        'Sylius\PriceHistoryPlugin\Domain\Factory' => 'Sylius\Component\Core\Factory',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelInterface' => 'Sylius\Component\Core\Model\ChannelInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfig' => 'Sylius\Component\Core\Model\ChannelPriceHistoryConfig',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigInterface' => 'Sylius\Component\Core\Model\ChannelPriceHistoryConfigInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface' => 'Sylius\Component\Core\Model\ChannelPricingInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingLogEntry' => 'Sylius\Component\Core\Model\ChannelPricingLogEntry',
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingLogEntryInterface' => 'Sylius\Component\Core\Model\ChannelPricingLogEntryInterface',
        'Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareInterface' => 'Sylius\Component\Core\Model\ChannelPricingInterface',
        'Sylius\PriceHistoryPlugin\Domain\Repository\ChannelPricingLogEntryRepositoryInterface' => 'Sylius\Component\Core\Repository\ChannelPricingLogEntryRepositoryInterface',
        'Sylius\PriceHistoryPlugin\Infrastructure\Cli\Command' => 'Sylius\Bundle\CoreBundle\PriceHistory\Cli\Command',
        'Sylius\PriceHistoryPlugin\Infrastructure\Doctrine\ORM\ChannelPricingLogEntryRepository' => 'Sylius\Bundle\CoreBundle\Doctrine\ORM\ChannelPricingLogEntryRepository',
        'Sylius\PriceHistoryPlugin\Infrastructure\Doctrine\ORM\ChannelPricingLogEntryRepositoryInterface' => 'Sylius\Component\Core\Repository\ChannelPricingLogEntryRepositoryInterface',
        'Sylius\PriceHistoryPlugin\Infrastructure\EntityObserver' => 'Sylius\Bundle\CoreBundle\PriceHistory\EntityObserver',
        'Sylius\PriceHistoryPlugin\Infrastructure\Event' => 'Sylius\Bundle\CoreBundle\PriceHistory\Event',
        'Sylius\PriceHistoryPlugin\Infrastructure\Event\OldChannelPricingLogEntriesEvents' => 'Sylius\Bundle\CoreBundle\PriceHistory\Event\OldChannelPricingLogEntriesEvents',
        'Sylius\PriceHistoryPlugin\Infrastructure\EventListener' => 'Sylius\Bundle\CoreBundle\PriceHistory\EventListener',
        'Sylius\PriceHistoryPlugin\Infrastructure\EventSubscriber' => 'Sylius\Bundle\CoreBundle\PriceHistory\EventSubscriber',
        'Sylius\PriceHistoryPlugin\Infrastructure\Form' => 'Sylius\Bundle\CoreBundle\Form',
        'Sylius\PriceHistoryPlugin\Infrastructure\Provider' => 'Sylius\Component\Core\Provider',
        'Sylius\PriceHistoryPlugin\Infrastructure\Remover\ChannelPricingLogEntriesRemover' => 'Sylius\Bundle\CoreBundle\PriceHistory\Remover\ChannelPricingLogEntriesRemover',
        'Sylius\PriceHistoryPlugin\Infrastructure\Serializer' => 'Sylius\Bundle\ApiBundle\Serializer',
        'Sylius\PriceHistoryPlugin\Infrastructure\Twig' => 'Sylius\Bundle\CoreBundle\Twig',
        'Sylius\PriceHistoryPlugin\Infrastructure\Validator' => 'Sylius\Bundle\ApiBundle\Validator',
    ]);
    $rectorConfig->ruleWithConfiguration(RemoveTraitUseRector::class, [
        'Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigAwareTrait',
        'Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareTrait',
    ]);
};
