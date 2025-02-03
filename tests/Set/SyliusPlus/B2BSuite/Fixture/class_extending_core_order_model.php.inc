<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements \Sylius\B2BKit\Entity\OrderInterface
{
    use \Sylius\B2BKit\Entity\OrderAwareTrait;
}

?>
