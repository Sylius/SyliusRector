<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements \Sylius\ProductBundlePlugin\Entity\ProductInterface
{
    use \Sylius\ProductBundlePlugin\Entity\ProductBundlesAwareTrait;
}

?>
