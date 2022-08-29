<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Product\Model\Product as BaseProduct;

class Product extends BaseProduct
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Product\Model\Product as BaseProduct;

class Product extends BaseProduct
{
    use Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceStocksAwareTrait {
        __construct as private initializeProductVariantTrait;
    }

    public function __construct()
    {
        parent::__construct();

        $this->initializeProductVariantTrait();
    }}

?>
