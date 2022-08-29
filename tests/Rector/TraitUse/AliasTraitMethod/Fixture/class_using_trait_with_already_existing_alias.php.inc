<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait {
        __construct as private initializeNothing;
    }
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait {
        __construct as private initializeSomething;
    }
}

?>
