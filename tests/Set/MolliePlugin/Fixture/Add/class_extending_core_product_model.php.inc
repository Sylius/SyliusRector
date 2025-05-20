<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements \Sylius\MolliePlugin\Entity\ProductInterface
{
    use \Sylius\MolliePlugin\Entity\ProductTrait;
}

?>
