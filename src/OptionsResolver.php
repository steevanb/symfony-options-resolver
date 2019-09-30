<?php

declare(strict_types=1);

namespace steevanb\SymfonyOptionsResolver;

use Symfony\Component\OptionsResolver\OptionsResolver as SymfonyOptionsResolver;

class OptionsResolver extends SymfonyOptionsResolver
{
    public function configureOption(string $name, array $allowedTypes, $default, array $allowedValues = null): self
    {
        $this
            ->setAllowedTypesAndValues($name, $allowedTypes, $allowedValues)
            ->setDefault($name, $default);

        return $this;
    }

    public function configureRequiredOption(string $name, array $allowedTypes, array $allowedValues = null): self
    {
        $this
            ->setAllowedTypesAndValues($name, $allowedTypes, $allowedValues)
            ->setRequired($name);

        return $this;
    }

    protected function setAllowedTypesAndValues(string $name, array $allowedTypes, array $allowedValues = null): self
    {
        $this
            ->setDefined($name)
            ->setAllowedTypes($name, $allowedTypes);
        if (is_array($allowedValues)) {
            $this->setAllowedValues($name, $allowedValues);
        }

        return $this;
    }
}
