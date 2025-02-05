<?php

use Sylius\Component\Core\Model\ShopUser as BaseShopUser;

class ShopUser extends BaseShopUser
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Vendor\Model\ShopUserInterface;
use Sylius\MarketplaceSuite\Component\Vendor\Model\ShopUserTrait;
use Sylius\Component\Core\Model\ShopUser as BaseShopUser;

class ShopUser extends BaseShopUser implements ShopUserInterface
{
    use ShopUserTrait;
}

?>
