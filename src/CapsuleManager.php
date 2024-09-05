<?php

/*
 * This file is part of the sxbrsky/database.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Sxbrsky\Database;

use Sxbrsky\Database\Driver\DriverManager;
use Sxbrsky\Database\Driver\DriverManagerInterface;

/**
 * @phpstan-import-type Params from \Sxbrsky\Database\CapsuleInterface
 */
final readonly class CapsuleManager
{
    /**
     * @var \Sxbrsky\Database\Driver\DriverManagerInterface $driverManager
     *  The driver manager.
     */
    private DriverManagerInterface $driverManager;

    public function __construct()
    {
        $this->driverManager = new DriverManager();
    }

    /**
     * Registers a new driver.
     *
     * @param string $name
     *  The name of the driver.
     * @param class-string<\Sxbrsky\Database\Driver> $driver
     *  The driver class name.
     */
    public function registerDriver(string $name, string $driver): void
    {
        $this->driverManager->add($name, $driver);
    }

    /**
     * Removes a driver.
     *
     * @param string $name
     *  The name of the driver to remove.
     */
    public function removeDriver(string $name): void
    {
        $this->driverManager->remove($name);
    }

    /**
     * Returns a list of available driver names.
     *
     * @return string[]
     *  The available drivers.
     */
    public function getAvailableDrivers(): array
    {
        return \array_keys($this->driverManager->all());
    }

    /**
     * Establishes a connection using the specified parameters.
     *
     * @param Params $params
     *  The connection parameters.
     *
     * @return \Sxbrsky\Database\CapsuleInterface
     *  The connection instance.
     *
     * @throws \InvalidArgumentException
     *  If the 'driver' parameter is missing.
     * @throws \Exception
     *  If the specified driver is unsupported.
     */
    public function getConnection(array $params): \Sxbrsky\Database\CapsuleInterface
    {
        if (!isset($params['driver'])) {
            throw new \InvalidArgumentException("Missing 'driver' parameter.");
        }

        try {
            $driverClass = $this->driverManager->get($params['driver']);
        } catch (\RuntimeException $e) {
            throw new \Exception("The given driver '{$params['driver']}' is unsupported.");
        }

        return new Capsule(new $driverClass(), $params);
    }
}
