<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistoryPlugin\Fixture;

use Sylius\Component\Core\Model\ChannelPricing as BaseChannelPricing;

class ChannelPricing extends BaseChannelPricing
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistoryPlugin\Fixture;

use Sylius\Component\Core\Model\ChannelPricing as BaseChannelPricing;

class ChannelPricing extends BaseChannelPricing implements \Sylius\PriceHistoryPlugin\Domain\Model\ChannelPricingInterface
{
    use \Sylius\PriceHistoryPlugin\Domain\Model\LowestPriceBeforeDiscountAwareTrait;
}

?>
