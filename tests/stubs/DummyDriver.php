<?php

/*
 * This file is part of the nulxrd/zinc.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Zinc\Tests\Stubs;

use Zinc\Driver;
use Zinc\Driver\Connection;
use SensitiveParameter;

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
