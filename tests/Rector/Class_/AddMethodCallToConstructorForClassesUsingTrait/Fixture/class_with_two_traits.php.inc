<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddMethodCallToConstructorForClassesUsingTrait\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
    use \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\BusinessUnitAwareTrait;
    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddMethodCallToConstructorForClassesUsingTrait\Fixture;

use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
    use \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\BusinessUnitAwareTrait;
    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
    public function __construct()
    {
        parent::__construct();
        $this->initializeSomething();
        $this->initializeSomethingElse();
    }
}

?>
