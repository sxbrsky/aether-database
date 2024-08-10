<?php

/*
 * This file is part of the sxbrsky/zinc.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Zinc;

use Zinc\Driver\DriverManager;
use Zinc\Driver\DriverManagerInterface;

/**
 * @phpstan-import-type Params from \Zinc\ZincInterface
 */
final readonly class ZincManager
{
    /**
     * @var \Zinc\Driver\DriverManagerInterface $driverManager
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
     * @param class-string<\Zinc\Driver> $driver
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
     * @return \Zinc\ZincInterface
     *  The connection instance.
     *
     * @throws \InvalidArgumentException
     *  If the 'driver' parameter is missing.
     * @throws \Exception
     *  If the specified driver is unsupported.
     */
    public function getConnection(array $params): \Zinc\ZincInterface
    {
        if (!isset($params['driver'])) {
            throw new \InvalidArgumentException("Missing 'driver' parameter.");
        }

        try {
            $driverClass = $this->driverManager->get($params['driver']);
        } catch (\RuntimeException $e) {
            throw new \Exception("The given driver '{$params['driver']}' is unsupported.");
        }

        return new Zinc(new $driverClass(), $params);
    }
}
