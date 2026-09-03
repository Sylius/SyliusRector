<?php

declare(strict_types=1);

namespace App\Entity\Order;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Order as BaseOrder;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_order')]
#[ORM\Index(name: 'idx_order_state', columns: ['state'])]
class Order extends BaseOrder
{
}

?>
-----
<?php

declare(strict_types=1);

namespace App\Entity\Order;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Order as BaseOrder;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_order')]
#[ORM\Index(name: 'idx_order_state', columns: ['state'])]
#[\Doctrine\ORM\Mapping\Index(name: 'idx_order_number', columns: ['number'])]
class Order extends BaseOrder
{
}

?>
