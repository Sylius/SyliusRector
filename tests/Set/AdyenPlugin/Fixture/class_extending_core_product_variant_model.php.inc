<?php

namespace Sylius\SyliusRector\Tests\Set\AdyenPlugin\Fixture;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\AdyenPlugin\Fixture;

use Sylius\AdyenPlugin\Entity\CommodityCodeAwareInterface;
use Sylius\AdyenPlugin\Entity\CommodityCodeAwareTrait;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant implements CommodityCodeAwareInterface
{
    use CommodityCodeAwareTrait;
}

?>
