<?php

namespace Sylius\SyliusRector\Tests\Set\LiveOnePageCheckoutPlugin\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\LiveOnePageCheckoutPlugin\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel implements \Sylius\LiveOnePageCheckoutPlugin\Entity\ChannelOnePageCheckoutAwareInterface
{
    use \Sylius\LiveOnePageCheckoutPlugin\Entity\ChannelOnePageCheckoutAwareTrait;
}

?>
