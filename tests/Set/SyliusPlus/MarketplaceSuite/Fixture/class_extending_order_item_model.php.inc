<?php

use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Order\Model\OrderItemInterface;
use Sylius\MarketplaceSuite\Component\Order\Model\OrderItemTrait;
use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem implements OrderItemInterface
{
    use OrderItemTrait;
}

?>
