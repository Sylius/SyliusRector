<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository as BaseCustomerRepository;

class CustomerRepository extends BaseCustomerRepository
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository as BaseCustomerRepository;

class CustomerRepository extends BaseCustomerRepository
{
    use \Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\FindLatestCustomersQueryTrait;
}

?>
