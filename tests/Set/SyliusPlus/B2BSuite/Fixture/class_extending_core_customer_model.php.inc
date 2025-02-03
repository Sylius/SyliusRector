<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Customer as BaseCustomer;

class Customer extends BaseCustomer
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Customer as BaseCustomer;

class Customer extends BaseCustomer implements \Sylius\B2BKit\Entity\CustomerInterface
{
    use \Sylius\B2BKit\Entity\CustomerAwareTrait;
}

?>
