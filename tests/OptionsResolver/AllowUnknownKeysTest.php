<?php

declare(strict_types=1);

namespace steevanb\SymfonyOptionsResolver\Tests\OptionsResolver;

use PHPUnit\Framework\TestCase;
use steevanb\SymfonyOptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException;

final class AllowUnknownKeysTest extends TestCase
{
    public function testDefault(): void
    {
        static::expectException(UndefinedOptionsException::class);
        $this
            ->createOptionsResolver()
            ->resolve(['foo' => 'bar', 'extraKey' => 'extraValue']);
    }

    public function testAllowed(): void
    {
        $this
            ->createOptionsResolver()
            ->setAllowUnknownKeys(true)
            ->resolve(['foo' => 'bar', 'extraKey' => 'extraValue']);

        static::addToAssertionCount(1);
    }

    public function testNotAllowed(): void
    {
        static::expectException(UndefinedOptionsException::class);
        $this
            ->createOptionsResolver()
            ->setAllowUnknownKeys(false)
            ->resolve(['foo' => 'bar', 'extraKey' => 'extraValue']);
    }

    private function createOptionsResolver(string $defaultValue = null): OptionsResolver
    {
        return (new OptionsResolver())
            ->configureOption('foo', ['string'], $defaultValue, ['bar']);
    }
}
