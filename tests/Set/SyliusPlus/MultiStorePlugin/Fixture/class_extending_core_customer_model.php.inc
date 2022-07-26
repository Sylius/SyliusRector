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

class Customer extends BaseCustomer implements \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerInterface
{
    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
}

?>
