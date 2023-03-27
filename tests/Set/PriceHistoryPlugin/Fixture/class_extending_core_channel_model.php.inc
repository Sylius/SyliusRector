<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistoryPlugin\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistoryPlugin\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel implements \Sylius\PriceHistoryPlugin\Domain\Model\ChannelInterface
{
    use \Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigAwareTrait;
}

?>
