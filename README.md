# Rector Rules for Sylius

## Installation Sylius-Standard 1.12+

Starting with Sylius-Standard 1.12 and above, we are providing a basic configuration to getting started with Sylius/SyliusRector. You can add rules or rule sets to your `<project_root>/rector.php` and reap benefits from Rector.

## Installation pre Sylius-Standard 1.12

`sylius/sylius-rector` package requires at least PHP 8.0. Of course, if you use PHP in version 7.4 you can use `rector/rector` to upgrade your PHP version easily!

Then, when you meet the minimal requirements, run the following commands:
```bash
composer require sylius/sylius-rector --dev
```

Finally, create `<project_root>/rector.php` file with the following content:
```php
<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Sylius\SyliusRector\Set\SyliusPlus;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();
    $rectorConfig->import(__DIR__ . '/vendor/sylius/sylius-rector/config/config.php');
    $rectorConfig->paths([
        __DIR__ . '/src'
    ]);
};

```

## Learn Rector Faster

Rector is a tool that [we develop](https://getrector.org/) and share for free, so anyone can save hundreds of hours on refactoring. But not everyone has time to understand Rector and AST complexity. You have 2 ways to speed this process up:

* read a book - <a href="https://leanpub.com/rector-the-power-of-automated-refactoring">The Power of Automated Refactoring</a>
* hire our experienced team to <a href="https://getrector.org/contact">improve your code base</a>

Both ways support us to and improve Rector in sustainable way by learning from practical projects.

### Thank you note

We would like to thank @alexander-schranz for starting this initiative and setting up initial codebase structure.
