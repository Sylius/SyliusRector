<?php

declare(strict_types=1);

namespace Sylius\PlusRbacPlugin\Domain\Model;

if (class_exists('Sylius\Component\Core\Model\AdminUserInterface')) {
    return;
}

interface AdminUserInterface
{
}
