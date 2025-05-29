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

class OrderItem extends BaseOrderItem implements \Sylius\ProductBundlePlugin\Entity\OrderItemInterface
{
    use \Sylius\ProductBundlePlugin\Entity\ProductBundleOrderItemsAwareTrait;
    public function __construct()
    {
        parent::__construct();
        $this->initializeProductBundleOrderItems();
    }
}

?>
