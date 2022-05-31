<?php

namespace Sylius\Rector\Tests\Set\Sylius_1_10\Fixture;

class UserGetUserNameToGetUserIdentifier {
    public function getUserIdentifier(\Symfony\Component\Security\Core\User\UserInterface $user): string
    {
        return $user->getUsername();
    }
}

?>
-----
<?php

namespace Sylius\Rector\Tests\Set\Sylius_1_10\Fixture;

class UserGetUserNameToGetUserIdentifier {
    public function getUserIdentifier(\Symfony\Component\Security\Core\User\UserInterface $user): string
    {
        return $user->getUserIdentifier();
    }
}

?>
