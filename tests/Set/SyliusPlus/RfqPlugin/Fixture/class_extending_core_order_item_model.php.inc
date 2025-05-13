<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem implements \Sylius\RfqPlugin\Entity\Order\OrderItemInterface
{
    use \Sylius\RfqPlugin\Entity\Order\OfferAwareTrait;
}

?>
