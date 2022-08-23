<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;

class AdminUser extends BaseAdminUser
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;

class AdminUser extends BaseAdminUser implements \Sylius\Component\Channel\Model\ChannelAwareInterface, \Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\LastLoginIpAwareInterface
{
    use \Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\LastLoginIpAwareTrait;
    use \Sylius\MultiStorePlugin\ChannelAdmin\Domain\Model\AdminChannelAwareTrait;
}

?>
