<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Remove;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements \Sylius\MolliePlugin\Entity\OrderInterface
{
    use \Sylius\MolliePlugin\Entity\AbandonedEmailOrderTrait;
    use \Sylius\MolliePlugin\Entity\RecurringOrderTrait;
    use \Sylius\MolliePlugin\Entity\QRCodeOrderTrait;
    use \Sylius\MolliePlugin\Entity\MolliePaymentIdOrderTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Remove;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
}

?>
