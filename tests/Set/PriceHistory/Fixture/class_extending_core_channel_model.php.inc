<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistory\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel implements \Sylius\PriceHistoryPlugin\Domain\Model\ChannelInterface
{
    use \Sylius\PriceHistoryPlugin\Domain\Model\ChannelPriceHistoryConfigAwareTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\PriceHistory\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel implements \Sylius\Component\Core\Model\ChannelInterface
{
}

?>
