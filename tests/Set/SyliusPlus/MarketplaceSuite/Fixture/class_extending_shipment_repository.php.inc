<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository as BaseShipmentRepository;

class ShipmentRepository extends BaseShipmentRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Order\Repository\ShipmentRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Order\Repository\ShipmentRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository as BaseShipmentRepository;

class ShipmentRepository extends BaseShipmentRepository implements ShipmentRepositoryInterface
{
    use ShipmentRepositoryTrait;
}

?>
