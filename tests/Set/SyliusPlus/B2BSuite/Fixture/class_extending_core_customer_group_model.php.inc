<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Customer\Model\CustomerGroup as BaseCustomerGroup;

class CustomerGroup extends BaseCustomerGroup
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Customer\Model\CustomerGroup as BaseCustomerGroup;

class CustomerGroup extends BaseCustomerGroup implements \Sylius\B2BKit\Entity\CustomerGroupInterface
{
    use \Sylius\B2BKit\Entity\CustomerGroupAwareTrait;
}

?>
