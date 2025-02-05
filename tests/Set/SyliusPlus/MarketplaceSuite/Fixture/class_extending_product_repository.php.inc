<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;

class ProductRepository extends BaseProductRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Product\Repository\ProductRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Product\Repository\ProductRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;

class ProductRepository extends BaseProductRepository implements ProductRepositoryInterface
{
    use ProductRepositoryTrait;
}

?>
