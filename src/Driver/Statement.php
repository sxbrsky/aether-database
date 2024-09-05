<?php

/*
 * This file is part of the sxbrsky/database.
 *
 * Copyright (C) 2024 Dominik Szamburski
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Sxbrsky\Database\Driver;

use Sxbrsky\Database\Sql\ParameterType;

interface Statement
{
    /**
     * Binds a value to a parameter.
     *
     * @param int|string $param
     *  Parameter identifier.
     * @param bool|int|null|resource|string $value
     *  The value to bind to the parameter.
     * @param \Sxbrsky\Database\Sql\ParameterType $type
     *  Explicit data type for the parameter.
     *
     * @return bool
     *  <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function bindValue(int|string $param, mixed $value, ParameterType $type): bool;

    /**
     * Executes a prepared statement.
     *
     * @return \Sxbrsky\Database\Driver\Result
     *  <b>Statement::execute</b> returns <b>Result</b> object.
     */
    public function execute(): Result;
}
