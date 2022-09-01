<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddMethodCallToConstructorForClassesUsingTrait\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddMethodCallToConstructorForClassesUsingTrait\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
}

?>
