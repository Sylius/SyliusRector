<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Remove;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements \Sylius\MolliePlugin\Entity\ProductInterface
{
    use \Sylius\MolliePlugin\Entity\ProductTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Remove;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct
{
}

?>
