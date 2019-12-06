<?php

declare(strict_types=1);

namespace steevanb\SymfonyOptionsResolver\Tests\OptionsResolver;

use PHPUnit\Framework\TestCase;
use steevanb\SymfonyOptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\{
    Exception\InvalidOptionsException,
    Exception\MissingOptionsException
};

final class ConfigureRequiredOptionTest extends TestCase
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

    public function testRequiredOption(): void
    {
        $optionsResolver = $this->createOptionsResolver();

        static::expectException(MissingOptionsException::class);
        $optionsResolver->resolve([]);
    }

    private function createOptionsResolver(): OptionsResolver
    {
        return (new OptionsResolver())
            ->configureRequiredOption('foo', ['string'], ['bar']);
    }
}
