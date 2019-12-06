### [1.1.0](../../compare/1.0.1...1.1.0) - 2019-12-06

- Add `OptionsResolver::allowUnknownKeys()`

### [1.0.1](../../compare/1.0.0...1.0.1) - 2019-09-30

- `$allowedValues` parameter of `OptionsResolver::confogureOptions()` and `OptionsResolver::configureRequiredOptions()` is now optional.
- [BC BREAK (should not impact a lot of people since library is not downloaded for now)] Inverse `OptionsResolver::configureOptions()` `$default` and `$allowedValues` parameters order.

### 1.0.0 - 2019-09-27

- Create `steevanb\SymfonyOptionsResolver\OptionsResolver`.
- Add `OptionsResolver::configureOption()`.
- Add `OptionsResolver::configureRequiredOption()`.
- Add CirclecCI build
- Add phpcs
- Add phpstan
- Add phpunit
- Add Scrutinizer
