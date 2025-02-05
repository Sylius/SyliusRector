<?php

use Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository as BaseChannelRepository;

class ChannelRepository extends BaseChannelRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Settlement\Repository\ChannelRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Settlement\Repository\ChannelRepositoryTrait;
use Sylius\Bundle\ChannelBundle\Doctrine\ORM\ChannelRepository as BaseChannelRepository;

class ChannelRepository extends BaseChannelRepository implements ChannelRepositoryInterface
{
    use ChannelRepositoryTrait;
}

?>
