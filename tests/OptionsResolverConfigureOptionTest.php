<?php

declare(strict_types=1);

namespace steevanb\SymfonyOptionsResolver\Tests;

use PHPUnit\Framework\TestCase;
use steevanb\SymfonyOptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;

final class OptionsResolverConfigureOptionTest extends TestCase
{
    public function testValid(): void
    {
        $this
            ->createOptionsResolver()
            ->resolve(['foo' => 'bar']);

        static::addToAssertionCount(1);
    }

    public function testInvalidType(): void
    {
        $optionsResolver = $this->createOptionsResolver();

        static::expectException(InvalidOptionsException::class);
        $optionsResolver->resolve(['foo' => 1]);
    }

    public function testInvalidAllowedValue(): void
    {
        $optionsResolver = $this->createOptionsResolver();

        static::expectException(InvalidOptionsException::class);
        $optionsResolver->resolve(['foo' => 'baz']);
    }

    public function testDefaultValue(): void
    {
        $optionsResolver = $this->createOptionsResolver('bar');
        $optionsResolver->resolve([]);

        static::addToAssertionCount(1);
    }

    private function createOptionsResolver(string $defaultValue = null): OptionsResolver
    {
        return (new OptionsResolver())
            ->configureOption('foo', ['string'], $defaultValue, ['bar']);
    }
}
