<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant
{
    use \Sylius\MolliePlugin\Entity\RecurringProductVariantTrait;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Set\MolliePlugin\Fixture;

use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

class ProductVariant extends BaseProductVariant
{
}

?>
