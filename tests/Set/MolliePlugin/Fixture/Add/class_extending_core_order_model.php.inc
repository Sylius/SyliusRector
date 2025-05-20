<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements \Sylius\MolliePlugin\Entity\OrderInterface
{
    use \Sylius\MolliePlugin\Entity\MolliePaymentIdOrderTrait;
    use \Sylius\MolliePlugin\Entity\QRCodeOrderTrait;
    use \Sylius\MolliePlugin\Entity\RecurringOrderTrait;
    use \Sylius\MolliePlugin\Entity\AbandonedEmailOrderTrait;
}

?>
