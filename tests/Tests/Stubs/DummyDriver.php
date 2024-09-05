<?php

/*
 * This file is part of the sxbrsky/database.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Sxbrsky\Tests\Stubs;

use SensitiveParameter;
use Sxbrsky\Database\Driver;
use Sxbrsky\Database\Driver\Connection;

class DummyDriver implements Driver
{
    /**
     * @inheritDoc
     */
    public function connect(#[SensitiveParameter] array $params): Connection
    {
        // TODO: Implement connect() method.
    }
}
