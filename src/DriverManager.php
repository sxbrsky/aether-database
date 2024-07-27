<?php

/*
 * This file is part of the nulxrd/hades.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Hades;

use Hades\Driver\Driver;

final class DriverManager implements DriverManagerInterface
{
    /**
     * @var array<string, \Hades\Driver\Driver> $drivers
     */
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
    public function get(string $name): Driver
    {
        return $this->drivers[$name] ?? throw new \RuntimeException("Driver '$name' was not registered.");
    }

    /**
     * @inheritDoc
     */
    public function register(Driver $driver, ?string $name = null): void
    {
        $name = $name ?: $driver::class;

        if (isset($this->drivers[$name])) {
            throw new \LogicException("Driver '$name' is already registered.");
        }

        $this->drivers[$name] = $driver;
    }

    /**
     * @inheritDoc
     */
    public function unregister(string $name): void
    {
        unset($this->drivers[$name]);
    }
}
