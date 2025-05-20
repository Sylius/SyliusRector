<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture\Add;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant implements \Sylius\MolliePlugin\Entity\ProductVariantInterface
{
    use \Sylius\MolliePlugin\Entity\RecurringProductVariantTrait;
}

?>
