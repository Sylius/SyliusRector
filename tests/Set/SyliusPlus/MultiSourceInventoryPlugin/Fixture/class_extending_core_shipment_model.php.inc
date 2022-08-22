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

class Shipment extends BaseShipment implements \Sylius\MultiSourceInventoryPlugin\Domain\Model\ShipmentInterface
{
    use \Sylius\MultiSourceInventoryPlugin\Domain\Model\InventorySourceAwareTrait;
}

?>
