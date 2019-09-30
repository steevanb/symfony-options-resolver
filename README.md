[![version](https://img.shields.io/badge/version-1.0.1-green.svg)](https://github.com/steevanb/symfony-options-resolver/tree/1.0.1)
[![doctrine](https://img.shields.io/badge/symfony/options_resolver-^2.6||^3.0||^4.0-blue.svg)](https://github.com/symfony/options-resolver)
[![php](https://img.shields.io/badge/php-^7.1-blue.svg)](http://www.php.net)
![Lines](https://img.shields.io/badge/code%20lines-376-green.svg)
![Total Downloads](https://poser.pugx.org/steevanb/symfony-options-resolver/downloads)
[![Scrutinizer](https://scrutinizer-ci.com/g/steevanb/symfony-options-resolver/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/steevanb/symfony-options-resolver/)

### symfony-options-resolver

Add features to Symfony [OptionsResolver](https://github.com/symfony/options-resolver) component.

[Changelog](changelog.md)

### Installation

```bash
composer require "steevanb/symfony-options-resolver": "^1.0.1"
```

### Examples

Define an optional option with a default value:
```php
use steevanb\SymfonyOptionsResolver\OptionsResolver

$optionsResolver = new OptionsResolver();

# Configure an optional option 
$optionsResolver->configureOption('foo', ['string'], ['bar', 'baz'], 'bar');

# Equivalent to call original OptionsResolver methods:
$optionsResolver
    ->setDefined('foo')
    ->setAllowedTypes('foo', ['string'])
    ->setAllowedValues('foo', ['bar', 'baz'])
    ->setDefault('foo', 'bar');
```

Define a required option:
```php
use steevanb\SymfonyOptionsResolver\OptionsResolver

$optionsResolver = new OptionsResolver();

# Configure a required option 
$optionsResolver->configureRequiredOption('foo', ['string'], ['bar', 'baz']);

# Equivalent to call original OptionsResolver methods:
$optionsResolver
    ->setDefined('foo')
    ->setAllowedTypes('foo', ['string'])
    ->setAllowedValues('foo', ['bar', 'baz'])
    ->setRequired('foo');
```
