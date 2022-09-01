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

class AdminUser extends BaseAdminUser implements \Sylius\PlusRbacPlugin\Domain\Model\AdminUserInterface
{
    use \Sylius\PlusRbacPlugin\Domain\Model\RoleableTrait {
        __construct as private initializeRoleableTrait;
    }
    use \Sylius\PlusRbacPlugin\Domain\Model\ToggleablePermissionCheckerTrait;
    public function __construct()
    {
        parent::__construct();
        $this->initializeRoleableTrait();
    }
}

?>
