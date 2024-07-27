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

interface DriverManagerInterface
{
    /**
     * Retrieves all registered drivers.
     *
     * @return Driver[]
     *  The registered drivers.
     */
    public function all(): array;

    /**
     * Retrieves a driver by its name.
     *
     * @param string $name
     *  The name of the driver to retrieve.
     *
     * @return \Hades\Driver\Driver
     *  The driver associated with the given name.
     *
     * @throws \RuntimeException If the driver with the specified name does not exist.
     */
    public function get(string $name): Driver;

    /**
     * Registers a new driver.
     *
     * @param \Hades\Driver\Driver $driver
     *  The driver to register.
     * @param string|null $name
     *  Optional name for the driver. If null, a default name will be a class name.
     *
     * @throws \LogicException
     *  If a driver with the given name is already registered.
     */
    public function register(Driver $driver, ?string $name = null): void;

    /**
     * Unregisters a driver.
     *
     * @param string $name
     *  The name of the driver to unregister.
     */
    public function unregister(string $name): void;
}
