<?php

use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository as BaseTaxonRepository;

class TaxonRepository extends BaseTaxonRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Vendor\Repository\TaxonRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Vendor\Repository\TaxonRepositoryTrait;
use Sylius\Bundle\TaxonomyBundle\Doctrine\ORM\TaxonRepository as BaseTaxonRepository;

class TaxonRepository extends BaseTaxonRepository implements TaxonRepositoryInterface
{
    use TaxonRepositoryTrait;
}

?>
