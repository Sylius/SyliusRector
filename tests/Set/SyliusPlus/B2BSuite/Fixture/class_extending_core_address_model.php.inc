<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Address as BaseAddress;

class Address extends BaseAddress
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Address as BaseAddress;

class Address extends BaseAddress implements \Sylius\B2BKit\Entity\AddressInterface
{
    use \Sylius\B2BKit\Entity\AddressAwareTrait;
}

?>
