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

use SensitiveParameter;
use Sxbrsky\Database\Driver\Connection;

interface Driver
{
    /**
     * Initializes a new connection.
     *
     * @param array $params
     *  The connection parameters.
     *
     * @return \Sxbrsky\Database\Driver\Connection
     *  The driver connection.
     */
    public function connect(#[SensitiveParameter] array $params): Connection;
}
