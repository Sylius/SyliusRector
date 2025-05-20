<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Remove;

use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;

class AdminUser extends BaseAdminUser implements \Sylius\MolliePlugin\Entity\OnboardingStatusAwareInterface
{
    use \Sylius\MolliePlugin\Entity\OnboardingStatusAwareTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Remove;

use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;

class AdminUser extends BaseAdminUser
{
}

?>
