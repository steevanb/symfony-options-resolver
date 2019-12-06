<?php

declare(strict_types=1);

namespace steevanb\SymfonyOptionsResolver;

use Symfony\Component\OptionsResolver\OptionsResolver as SymfonyOptionsResolver;

class OptionsResolver extends SymfonyOptionsResolver
{
    /** @var bool */
    protected $allowUnknownKeys = false;

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

    public function setAllowUnknownKeys(bool $allow): self
    {
        $this->allowUnknownKeys = $allow;

        return $this;
    }

    public function resolve(array $options = [])
    {
        if ($this->allowUnknownKeys) {
            $this->setDefined(array_keys($options));
        }

        return parent::resolve($options);
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
