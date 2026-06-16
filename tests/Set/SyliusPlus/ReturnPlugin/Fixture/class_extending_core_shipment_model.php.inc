<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Shipment as BaseShipment;

class Shipment extends BaseShipment
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Shipment as BaseShipment;

class Shipment extends BaseShipment implements \Sylius\ReturnPlugin\Domain\Model\ShipmentInterface
{
    use \Sylius\ReturnPlugin\Domain\Model\DeliveredAtAwareTrait;
}

?>
