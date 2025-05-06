<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements \Sylius\B2BKit\Entity\ProductInterface
{
    use \Sylius\B2BKit\Entity\CustomerGroupsAwareTrait {
        CustomerGroupsAwareTrait::__construct as private initializeCustomerGroupsTrait;
    }
    use \Sylius\B2BKit\Entity\OrganizationsAwareTrait {
        OrganizationsAwareTrait::__construct as private initializeOrganizationsTrait;
    }
    public function __construct()
    {
        parent::__construct();
        $this->initializeCustomerGroupsTrait();
        $this->initializeOrganizationsTrait();
    }
}

?>
