<?php

/*
 * This file is part of the nulxrd/hades.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Hades\Tests\Unit;

use Hades\Driver;
use Hades\DriverManager;
use Hades\DriverManagerInterface;
use Hades\Tests\Stubs\DummyDriver;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DriverManager::class)]
class DriverManagerTest extends TestCase
{
    private DriverManagerInterface $driverManager;

    public function setUp(): void
    {
        $this->driverManager = new DriverManager();
    }

    public function testGetThrowsExceptionWhileGetUnregisteredDriver(): void
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage("Driver 'custom-name' was not registered.");

        $this->driverManager->get('custom-name');
    }

    public function testRegister(): void
    {
        $this->driverManager->register(new DummyDriver());
        self::assertInstanceOf(Driver::class, $this->driverManager->get(DummyDriver::class));
    }

    public function testRegisterWithName(): void
    {
        $driver = new DummyDriver();
        $this->driverManager->register($driver, 'custom-name');

        self::assertEquals($driver, $this->driverManager->get('custom-name'));
        self::assertInstanceOf(Driver::class, $this->driverManager->get('custom-name'));
    }

    public function testRegisterThrowsExceptionWhileOverride(): void
    {
        self::expectException(\LogicException::class);
        self::expectExceptionMessage("Driver '" . DummyDriver::class . "' is already registered.");

        $this->driverManager->register(new DummyDriver());
        $this->driverManager->register(new DummyDriver());
    }

    public function testUnregister(): void
    {
        $this->driverManager->register(new DummyDriver());
        $this->driverManager->unregister(DummyDriver::class);

        self::assertEmpty($this->driverManager->all());
    }

    public function testAll(): void
    {
        $this->driverManager->register(new DummyDriver());
        self::assertCount(1, $this->driverManager->all());
    }
}
