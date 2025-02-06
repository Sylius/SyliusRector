<?php

use Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository as BasePaymentRepository;

class PaymentRepository extends BasePaymentRepository
{
}

?>
-----
<?php

use Sylius\MarketplaceSuite\Component\Order\Repository\PaymentRepositoryInterface;
use Sylius\MarketplaceSuite\Component\Order\Repository\PaymentRepositoryTrait;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\PaymentRepository as BasePaymentRepository;

class PaymentRepository extends BasePaymentRepository implements PaymentRepositoryInterface
{
    use PaymentRepositoryTrait;
}

?>
