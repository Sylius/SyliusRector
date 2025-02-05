<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository as BaseProductVariantRepository;

class ProductVariantRepository extends BaseProductVariantRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Product\Repository\ProductVariantRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Product\Repository\ProductVariantRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductVariantRepository as BaseProductVariantRepository;

class ProductVariantRepository extends BaseProductVariantRepository implements ProductVariantRepositoryInterface
{
    use ProductVariantRepositoryTrait;
}

?>
