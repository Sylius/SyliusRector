# Sets Overview

## SyliusPlus::MULTI_STORE_PLUGIN

Adds the set to 

```php
use Rector\Config\RectorConfig;
use Sylius\SyliusRector\Rector\Class_\AddInterfaceToClassExtendingTypeRector;

return static function (RectorConfig $rectorConfig): void {
    // content
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
    // content
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
