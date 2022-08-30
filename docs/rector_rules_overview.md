# 4 Rules Overview

## AddInterfaceToClassExtendingTypeRector

Add the given set of interfaces to the classes extending the given type

:wrench: **configure it!**

- class: [`Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector`](../src/Rector/Class_/AddInterfaceToClassExtendingTypeRector.php)

```php
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddInterfaceToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface',
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\ChannelInterface',
        ],
    ]);
};

```

↓

```diff
use Sylius\Component\Core\Model\Channel as BaseChannel;

-class Channel extends BaseChannel
+class Channel extends BaseChannel implements \Sylius\MultiStorePlugin\BusinessUnits\Domain\Model\ChannelInterface, \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\ChannelInterface
{
}
```

## AddTraitToClassExtendingTypeRector

Add the given set of traits to the classes extending the given type

:wrench: **configure it!**

- class: [`Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector`](../src/Rector/Class_/AddTraitToClassExtendingTypeRector.php)

```php
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddTraitToClassExtendingTypeRector::class, [
        'Sylius\Component\Core\Model\Channel' => [
            'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait',
        ],
    ]);
};


```

↓

```diff
use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
+    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
}
```

## AddMethodCallToConstructorForClassesUsingTraitRector

Adds given method calls to constructor for classes using given trait

:wrench: **configure it!**

- class: [`Sylius\SyliusRector\Rector\Class_\AddMethodCallToConstructorForClassesUsingTraitRector`](../src/Rector/Class_/AddMethodCallToConstructorForClassesUsingTraitRector.php)

```php
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;
use Sylius\SyliusRector\Rector\Dto\AddMethodCallToConstructorForClassesUsingTrait;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AddMethodCallToConstructorForClassesUsingTraitRector::class, [
        'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait' => [
            new AddMethodCallToConstructorForClassesUsingTrait('this', 'initializeSomething'),
        ],
    ]);
};


```

↓

```diff
use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
    public function __construct()
    {
+        $this->initializeSomething();
    }
}
```

## AliasTraitMethodRector

Aliases the given trait's method to the given name

:wrench: **configure it!**

- class: [`Sylius\SyliusRector\Rector\TraitUse\AliasTraitMethodRector`](../src/Rector/TraitUse/AliasTraitMethodRector.php)

```php
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddTraitToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(AliasTraitMethodRector::class, [
        'Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait' => [
            [
                'traitMethod' => '__construct',
                'newMethodName' => 'initializeSomething',
                'visibility' => Class_::MODIFIER_PRIVATE,
            ],
        ],
    ]);
};


```

↓

```diff
use Sylius\Component\Core\Model\Channel as BaseChannel;

class Channel extends BaseChannel
{
-    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait;
+    use \Sylius\MultiStorePlugin\CustomerPools\Domain\Model\CustomerPoolAwareTrait {
+        __construct as private initializeSomething;
+    }
}
```
