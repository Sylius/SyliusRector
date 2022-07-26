<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository as BasePaymentRepository;

class PaymentRepository extends BasePaymentRepository
{
}

?>
-----
<?php

namespace Sylius\SyliusRector\Tests\Rector\Class_\AddInterfaceToClassExtendingType\Fixture;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository as BasePaymentRepository;

class PaymentRepository extends BasePaymentRepository
{
    use \Sylius\MultiStorePlugin\ChannelAdmin\Infrastructure\Doctrine\ORM\CreatePaymentListQueryBuilderTrait;
}

?>
