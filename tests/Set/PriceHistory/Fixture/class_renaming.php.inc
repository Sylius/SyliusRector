<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface;

class SomeClass
{
    function someFunction(\Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface $someOldClass): \Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface
    {
        return $someOldClass;
    }
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Component\Core\Model\ChannelPricingInterface;

class SomeClass
{
    function someFunction(\Sylius\Component\Core\Model\ChannelPricingInterface $someOldClass): \Sylius\Component\Core\Model\ChannelPricingInterface
    {
        return $someOldClass;
    }
}

?>
