<?php

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Order\Model\OrderInterface;
use Sylius\MarketplaceSuite\Component\Order\Model\OrderTrait;
use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements OrderInterface
{
    use OrderTrait;
}

?>
