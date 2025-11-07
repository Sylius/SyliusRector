<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\RenameClass\Fixture;

use Sylius\B2BKit\Form\Type\ProductVariantAutocompleteType;

class SomeClass
{
    private ProductVariantAutocompleteType $autocomplete;
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\RenameClass\Fixture;

use Sylius\B2BKit\Form\Type\ProductVariantAutocompleteType;

class SomeClass
{
    private \Sylius\B2BKit\Common\Form\Type\Shop\ProductVariantAutocompleteType $autocomplete;
}

?>
