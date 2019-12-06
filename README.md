[![version](https://img.shields.io/badge/version-1.1.0-green.svg)](https://github.com/steevanb/symfony-options-resolver/tree/1.1.0)
[![doctrine](https://img.shields.io/badge/symfony/options_resolver-^2.6||^3.0||^4.0-blue.svg)](https://github.com/symfony/options-resolver)
[![php](https://img.shields.io/badge/php-^7.1-blue.svg)](http://www.php.net)
![Lines](https://img.shields.io/badge/code%20lines-454-green.svg)
![Total Downloads](https://poser.pugx.org/steevanb/symfony-options-resolver/downloads)
[![Scrutinizer](https://scrutinizer-ci.com/g/steevanb/symfony-options-resolver/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/steevanb/symfony-options-resolver/)

### symfony-options-resolver

Add features to Symfony [OptionsResolver](https://github.com/symfony/options-resolver) component.

[Changelog](changelog.md)

### Installation

```bash
composer require "steevanb/symfony-options-resolver": "^1.1.0"
```

### Examples

Define an optional option with a default value:
```php
use steevanb\SymfonyOptionsResolver\OptionsResolver;

$optionsResolver = new OptionsResolver();

# Configure an optional option 
$optionsResolver->configureOption('foo', ['string'], 'default', ['default', 'value1', 'value2']);

# Equivalent to call original OptionsResolver methods:
$optionsResolver
    ->setDefined('foo')
    ->setAllowedTypes('foo', ['string'])
    ->setDefault('foo', 'default')
    ->setAllowedValues('foo', ['default', 'value1', 'value2']);
```

Define a required option:
```php
use steevanb\SymfonyOptionsResolver\OptionsResolver;

$optionsResolver = new OptionsResolver();

# Configure a required option 
$optionsResolver->configureRequiredOption('foo', ['string'], ['value1', 'value2']);

# Equivalent to call original OptionsResolver methods:
$optionsResolver
    ->setRequired('foo')
    ->setAllowedTypes('foo', ['string'])
    ->setAllowedValues('foo', ['value1', 'value2']);
```

Allow unknown keys:
```php
use steevanb\SymfonyOptionsResolver\OptionsResolver;

# This will not throw an exception because extraKey is not configured
(new OptionsResolver())
    ->configureRequiredOption('foo', ['string'], ['value1', 'value2'])
    ->setAllowUnknownKeys(true)
    ->resolve(['foo' => 'value1', 'extraKey' => 'extraValue']);
```
