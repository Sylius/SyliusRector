<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductReviewRepository as BaseProductReviewRepository;

class ProductReviewRepository extends BaseProductReviewRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Product\Repository\ProductReviewRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Product\Repository\ProductReviewRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductReviewRepository as BaseProductReviewRepository;

class ProductReviewRepository extends BaseProductReviewRepository implements ProductReviewRepositoryInterface
{
    use ProductReviewRepositoryTrait;
}

?>
