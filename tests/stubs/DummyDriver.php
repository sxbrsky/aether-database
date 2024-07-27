<?php

/*
 * This file is part of the nulxrd/hades.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Hades\Tests\Stubs;

use Hades\Driver\Driver;
use Hades\Driver\Result;
use Hades\Driver\Statement;
use JetBrains\PhpStorm\Language;
use SensitiveParameter;

class DummyDriver implements Driver
{
    /**
     * @inheritDoc
     */
    public function connect(#[SensitiveParameter] array $params): void {
        // TODO: Implement connect() method.
    }

    /**
     * @inheritDoc
     */
    public function prepare(#[Language('SQL')] string $sql): Statement {
        // TODO: Implement prepare() method.
    }

    /**
     * @inheritDoc
     */
    public function query(#[Language('SQL')] string $sql): Result {
        // TODO: Implement query() method.
    }

    /**
     * @inheritDoc
     */
    public function execute(#[Language('SQL')] string $sql): int|string {
        // TODO: Implement execute() method.
    }

    /**
     * @inheritDoc
     */
    public function beginTransaction(): bool {
        // TODO: Implement beginTransaction() method.
    }

    /**
     * @inheritDoc
     */
    public function commit(): bool {
        // TODO: Implement commit() method.
    }

    /**
     * @inheritDoc
     */
    public function rollback(): bool {
        // TODO: Implement rollback() method.
    }
}
