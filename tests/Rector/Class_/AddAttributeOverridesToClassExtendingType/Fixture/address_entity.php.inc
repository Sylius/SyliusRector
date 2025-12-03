<?php

declare(strict_types=1);

namespace App\Entity\Addressing;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Address as BaseAddress;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_address')]
class Address extends BaseAddress
{
}

?>
-----
<?php

declare(strict_types=1);

namespace App\Entity\Addressing;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Address as BaseAddress;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_address')]
#[\Doctrine\ORM\Mapping\AttributeOverrides([new \Doctrine\ORM\Mapping\AttributeOverride(name: 'firstName', column: new \Doctrine\ORM\Mapping\Column(name: 'first_name', type: 'string', nullable: true)), new \Doctrine\ORM\Mapping\AttributeOverride(name: 'lastName', column: new \Doctrine\ORM\Mapping\Column(name: 'last_name', type: 'string', nullable: true))])]
class Address extends BaseAddress
{
}

?>
