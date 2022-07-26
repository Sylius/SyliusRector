<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel implements \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface, \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\ChannelInterface
{
    use \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\BusinessUnitAwareTrait;
}

?>
