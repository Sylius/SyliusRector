<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository as BaseShipmentRepository;

class ShipmentRepository extends BaseShipmentRepository
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ShipmentRepository as BaseShipmentRepository;

class ShipmentRepository extends BaseShipmentRepository
{
    use \Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\CreateShipmentListQueryBuilderTrait;
}

?>
