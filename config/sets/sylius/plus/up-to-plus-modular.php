<?php

declare(strict_types=1);

namespace Sylius\SyliusRector\Set;

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\Namespace_\RenameNamespaceRector;

return static function(RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        'Sylius\Plus\Controller\DashboardController' => 'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Controller\DashboardController',
        'Sylius\Plus\Factory\VariantsQuantityMapFactory' => 'Sylius\MultiSourceInventoryPlugin\Integration\CustomerService\Factory\VariantsQuantityMapFactory',
        'Sylius\Plus\Factory\VariantsQuantityMapFactoryInterface' => 'Sylius\MultiSourceInventoryPlugin\Integration\CustomerService\Factory\VariantsQuantityMapFactoryInterface',
        'Sylius\Plus\Inventory\Infrastructure\Ui\SplitShipmentAction' => 'Sylius\MultiSourceInventoryPlugin\Integration\CustomerService\Action\SplitShipmentAction',
        'Sylius\Plus\Inventory\Infrastructure\Validator\StockSufficientForInventorySource' => 'Sylius\MultiSourceInventoryPlugin\Integration\CustomerService\Validator\StockSufficientForInventorySource',
        'Sylius\Plus\Inventory\Infrastructure\Validator\StockSufficientForInventorySourceValidator' => 'Sylius\MultiSourceInventoryPlugin\Integration\CustomerService\Validator\StockSufficientForInventorySourceValidator',
        'Sylius\Plus\Returns\Infrastructure\Ui\Admin\ReturnUnitsToInventoryAction' => 'Sylius\Plus\Ui\Admin\ReturnUnitsToInventoryAction',
        'Sylius\Plus\Returns\Infrastructure\Ui\Admin\SelectUnitsToReturnToInventoryAction' => 'Sylius\ReturnPlugin\Infrastructure\Ui\Admin\SelectUnitsToReturnToInventoryAction',
        'Sylius\Plus\SharedKernel\Exception\ResourceNotSupportedException' => 'Sylius\SharedKernel\Exception\ResourceNotSupportedException',
        'Sylius\Plus\SharedKernel\ResourceChannelCheckerInterface' => 'Sylius\SharedKernel\Contract\ResourceChannelCheckerInterface',
    ]);

    $rectorConfig->ruleWithConfiguration(RenameNamespaceRector::class, [
        'Sylius\Plus\BusinessUnits' => 'Sylius\MultiStorePlugin\BusinessUnits',
        'Sylius\Plus\ChannelAdmin\Infrastructure\Doctrine\ORM\ChannelRestrictingProductListQueryBuilderInterface' => 'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\ChannelRestrictingProductListQueryBuilderInterface',
        'Sylius\Plus\ChannelAdmin\Infrastructure\Doctrine\ORM\CreditMemoListQueryBuilderInterface' => 'Sylius\MultiStorePlugin\Integration\Refund\Doctrine\ORM\CreditMemoListQueryBuilderInterface',
        'Sylius\Plus\ChannelAdmin\Infrastructure\Doctrine\ORM\CustomerListQueryBuilderInterface' => 'Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\CustomerListQueryBuilderInterface',
        'Sylius\Plus\ChannelAdmin\Infrastructure\Doctrine\ORM\FindProductsByChannelAndPhraseQueryInterface' => 'Sylius\LoyaltyPlugin\Infrastructure\Doctrine\ORM\FindProductsByChannelAndPhraseQueryInterface',
        'Sylius\Plus\ChannelAdmin\Infrastructure\Doctrine\ORM\InvoiceListQueryBuilderInterface' => 'Sylius\MultiStorePlugin\Integration\Invoicing\Doctrine\ORM\InvoiceListQueryBuilderInterface',
        'Sylius\Plus\ChannelAdmin' => 'Sylius\MultiStorePlugin\ChannelAdmin',
        'Sylius\Plus\Checker\CreditMemoResourceChannelChecker' => 'Sylius\MultiStorePlugin\Integration\Refund\Checker\CreditMemoResourceChannelChecker',
        'Sylius\Plus\Checker\InvoiceResourceChannelChecker' => 'Sylius\MultiStorePlugin\Integration\Invoicing\Checker\InvoiceResourceChannelChecker',
        'Sylius\Plus\Checker\OrderItemsAvailabilityChecker' => 'Sylius\ReturnPlugin\Application\Checker\OrderItemsAvailabilityChecker',
        'Sylius\Plus\CustomerPools' => 'Sylius\MultiStorePlugin\CustomerPools',
        'Sylius\Plus\Doctrine\ORM\CountCustomersQueryInterface' => 'Sylius\MultiStorePlugin\Doctrine\ORM\CountCustomersQueryInterface',
        'Sylius\Plus\Doctrine\ORM\CountUnshippedUnitsQueryInterface' => 'Sylius\MultiSourceInventoryPlugin\Infrastructure\Doctrine\ORM\CountUnshippedUnitsQueryInterface',
        'Sylius\Plus\Doctrine\ORM\FindProductVariantsByNameInChannelQueryInterface' => 'Sylius\MultiSourceInventoryPlugin\Infrastructure\Doctrine\ORM\CountUnshippedUnitsQueryInterface',
        'Sylius\Plus\Entity\LastLoginIpAwareInterface' => 'Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\LastLoginIpAwareInterface',
        'Sylius\Plus\Entity\LastLoginIpAwareTrait' => 'Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\LastLoginIpAwareTrait',
        'Sylius\Plus\Factory\InvoiceShopBillingDataFactoryInterface' => 'Sylius\MultiStorePlugin\Integration\Invoicing\Factory\InvoiceShopBillingDataFactoryInterface',
        'Sylius\Plus\Inventory' => 'Sylius\MultiSourceInventoryPlugin',
        'Sylius\Plus\Loyalty' => 'Sylius\LoyaltyPlugin',
        'Sylius\Plus\PartialShipping' => 'Sylius\CustomerServicePlugin\PartialShipment',
        'Sylius\Plus\Rbac' => 'Sylius\PlusRbacPlugin',
        'Sylius\Plus\Returns\Application\Checker\ReturnRequestResourceChannelChecker' => 'Sylius\MultiStorePlugin\Integration\Return\Checker\ReturnRequestResourceChannelChecker',
        'Sylius\Plus\Returns' => 'Sylius\ReturnPlugin',
        'Sylius\Plus\Installer\Provider\ChannelProviderInterface' => 'Sylius\MultiStorePlugin\CustomerPools\Infrastructure\Installer\Provider\ChannelProviderInterface',
        'Sylius\Plus\Installer\Provider\CustomerPoolProviderInterface' => 'Sylius\MultiStorePlugin\CustomerPools\Infrastructure\Installer\Provider\CustomerPoolProviderInterface',
    ]);
};
