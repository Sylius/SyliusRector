<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

class SomeClass extends \Sylius\B2BKit\Entity\Organization
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

class SomeClass extends \Sylius\B2BKit\Organization\Entity\Organization
{
}

?>
