<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Plus\PartialShipping\Application\Creator\PartialShipmentCreator;

class SomeClass extends PartialShipmentCreator
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\CustomerServicePlugin\PartialShipment\Application\Creator\PartialShipmentCreator;

class SomeClass extends PartialShipmentCreator
{
}

?>
