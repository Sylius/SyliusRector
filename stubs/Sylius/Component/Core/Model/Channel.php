<?php

namespace Sylius\Component\Core\Model;

use Sylius\Component\Channel\Model\Channel as BaseChannel;

if (class_exists('Sylius\Component\Core\Model\Channel')) {
    return;
}

class Channel extends BaseChannel
{

}
