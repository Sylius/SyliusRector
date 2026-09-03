<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_variant')]
class ProductVariant extends BaseProductVariant
{
}

?>
-----
<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_variant')]
#[\Doctrine\ORM\Mapping\Index(name: 'idx_product_variant_code', columns: ['code'])]
#[\Doctrine\ORM\Mapping\Index(name: 'idx_product_variant_position', columns: ['position'])]
class ProductVariant extends BaseProductVariant
{
}

?>
