<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository as BaseOrderRepository;

class OrderRepository extends BaseOrderRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Order\Repository\OrderRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Order\Repository\OrderRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\OrderRepository as BaseOrderRepository;

class OrderRepository extends BaseOrderRepository implements OrderRepositoryInterface, \Sylius\MarketplaceSuite\Component\Product\Repository\OrderRepositoryInterface
{
    use OrderRepositoryTrait;
    use \Sylius\MarketplaceSuite\Component\Product\Repository\OrderRepositoryTrait;
}

?>
