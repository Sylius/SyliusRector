<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\ShopUser as BaseShopUser;

class ShopUser extends BaseShopUser
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\ShopUser as BaseShopUser;

class ShopUser extends BaseShopUser implements \Sylius\B2BKit\Entity\ShopUserInterface
{
    use \Sylius\B2BKit\Entity\ShopUserAwareTrait;
}

?>
