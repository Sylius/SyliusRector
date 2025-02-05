<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository as BaseCustomerRepository;

class CustomerRepository extends BaseCustomerRepository
{
}

?>

-----
<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository as BaseCustomerRepository;

class CustomerRepository extends BaseCustomerRepository implements \Sylius\MarketplaceSuite\Component\Vendor\Repository\CustomerRepositoryInterface
{
    use \Sylius\MarketplaceSuite\Component\Vendor\Repository\CustomerRepositoryTrait;
}

?>
