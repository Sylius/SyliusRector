<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Bundle\PayumBundle\Model\GatewayConfig as BaseGatewayConfig;

class GatewayConfig extends BaseGatewayConfig
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Bundle\PayumBundle\Model\GatewayConfig as BaseGatewayConfig;

class GatewayConfig extends BaseGatewayConfig implements \Sylius\MolliePlugin\Entity\GatewayConfigInterface
{
    use \Sylius\MolliePlugin\Entity\GatewayConfigTrait;
    public function __construct()
    {
        parent::__construct();
        $this->initializeMollieGatewayConfig();
    }
}

?>
