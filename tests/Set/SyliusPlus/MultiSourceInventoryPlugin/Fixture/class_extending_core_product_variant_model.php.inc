<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant implements \Sylius\MultiSourceInventoryPlugin\Domain\Model\ProductVariantInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->initializeInventorySourceStocksTrait();
    }
    use \Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceStocksAwareTrait {
        __construct as private initializeInventorySourceStocksTrait;
    }
}

?>
