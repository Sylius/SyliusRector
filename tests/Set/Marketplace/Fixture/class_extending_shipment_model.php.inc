<?php

use Sylius\Component\Core\Model\Shipment as BaseShipment;

class Shipment extends BaseShipment
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Order\Model\ShipmentInterface;
use Sylius\MarketplaceSuite\Component\Order\Model\ShipmentTrait;
use Sylius\Component\Core\Model\Shipment as BaseShipment;

class Shipment extends BaseShipment implements ShipmentInterface
{
    use ShipmentTrait;
}

?>
