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

use Hades\Driver\Connection;
use SensitiveParameter;

interface Driver
{
    /**
     * Initializes a new connection.
     *
     * @param array $params
     *  The connection parameters.
     *
     * @return \Hades\Driver\Connection
     *  The driver connection.
     */
    public function connect(#[SensitiveParameter] array $params): Connection;
}
