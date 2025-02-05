<?php

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Product\Entity\ProductInterface;
use Sylius\MarketplaceSuite\Component\Product\Model\ProductTrait;
use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements ProductInterface
{
    use ProductTrait;
}

?>
