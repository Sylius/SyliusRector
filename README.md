# Sylius Rector

This project contains [Rector rules](https://github.com/rectorphp/rector) for [Sylius E-Commerce System](https://github.com/sylius/sylius) upgrades.

## Install

Install rector and sylius rector via composer to your project:

```bash
composer require rector/rector --dev
composer require sylius/sylius-rector --dev
```

## Use Sets

To add a set to your config, use `Sylius\Rector\Set\SyliusSetList` and `Sylius\Rector\Set\SyliusLevelSetList`
class and pick one of constants:

```php
use Sylius\Rector\Set\SyliusLevelSetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        SyliusLevelSetList::UP_TO_SYLIUS_1_11,
    ]);
};
```

### Thank you note

We would like to thank @alexander-schranz for starting this initiative and setting up initial codebase structure.
