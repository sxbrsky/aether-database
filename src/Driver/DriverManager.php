<?php

/*
 * This file is part of the sxbrsky/zinc.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Zinc\Driver;

use Zinc\Driver;

/**
 * @internal
 */
final class DriverManager implements DriverManagerInterface
{
    /** @var array<string, class-string<\Zinc\Driver>> $drivers */
    private array $drivers = [];

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->drivers;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): \Zinc\Driver
    {
        if (!\array_key_exists($name, $this->drivers)) {
            throw new \RuntimeException("Driver '{$name}' was not registered.");
        }

        return new $this->drivers[$name]();
    }

    /**
     * @inheritDoc
     */
    public function add(string $name, string $driverClass): void
    {
        if (\array_key_exists($name, $this->drivers)) {
            throw new \LogicException("Driver '{$name}' is already registered.");
        }

        if (!\is_subclass_of($driverClass, Driver::class)) {
            throw new \InvalidArgumentException("\$driverClass must be a instanceof " . Driver::class);
        }

        $this->drivers[$name] = $driverClass;
    }

    /**
     * @inheritDoc
     */
    public function remove(string $name): void
    {
        unset($this->drivers[$name]);
    }
}
