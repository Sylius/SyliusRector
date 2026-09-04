<?php

namespace Sylius\SyliusRector\Tests\Set\LiveOnePageCheckoutPlugin\Fixture;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\LiveOnePageCheckoutPlugin\Fixture;

use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements \Sylius\LiveOnePageCheckoutPlugin\Entity\OrderAndItemPromotionTotalAwareInterface
{
    use \Sylius\LiveOnePageCheckoutPlugin\Entity\OrderShippingTaxTotalTrait;
    use \Sylius\LiveOnePageCheckoutPlugin\Entity\OrderAndItemPromotionTotalAwareTrait;
}

?>
