<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistory\Fixture;

use Sylius\Component\Core\Model\ChannelPricing as BaseChannelPricing;

class ChannelPricing extends BaseChannelPricing implements \Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface
{
    use \Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistory\Fixture;

use Sylius\Component\Core\Model\ChannelPricing as BaseChannelPricing;

class ChannelPricing extends BaseChannelPricing implements \Sylius\Component\Core\Model\ChannelPricingInterface
{
}

?>
